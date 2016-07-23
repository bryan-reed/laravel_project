<?php
namespace App\Http\Controllers;

use App\Doctor;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
	public function getHome()
	{
		$doctors = Doctor::all();
		return view('welcome', ['doctors' => $doctors, 'route' => 'doctor.view']);
	}

	public function saveDoctor(Request $request) 
	{
		$mode = $request->has('doctor_id')?'edit':'add';
		//validation
		$this->validate($request, [
			'first_name' => 'required|max:100',
			'last_name' => 'required|max:100',
			'bio' => 'required'
		]);
		
		if($mode == 'edit') {
			$doctor = Doctor::find($request['doctor_id']);
		} else {
			$doctor = new Doctor();
		}
		
		$doctor->first_name = $request['first_name'];
		$doctor->last_name = $request['last_name'];
		$doctor->bio = $request['bio'];
		$file = $request->file('image');
		//Upload image
		if($file && $file->isValid()) {
			$filename = $request['first_name'].'-'.$request['last_name'].'.'.$file->getClientOriginalExtension();
			//Delete existing file if it exists
			if(Storage::disk('local')->exists($filename)) {
				Storage::delete($filename);
			}
			//Save new file
			Storage::disk('local')->put($filename, File::get($file));
			$doctor->image = $filename;
		}

		$request->user()->doctors()->save($doctor);

		$request->session()->flash('success', 'Doctor successfully saved!');

		return redirect()->route('doctor.manage', ['id' => $doctor->id]);
		
		
	}

	public function getDoctorImage($filename) {
		$file = Storage::disk('local')->get($filename);
		return new Response($file, 200);
	}

	public function manageDoctor($id = null) {
		$mode = 'add';
		if($id) {
			$mode = 'edit';
			$doctor = Doctor::find($id);
		} else {
			$doctor = new Doctor();
		}
			
		return view('includes.doctorform', ['mode' => $mode, 'doctor' => $doctor]);
	}

	public function searchDoctors(Request $request) {
		$doctors = array();
		$words = explode(' ', $request['name']);
		$doctors = Doctor::where(function($query) use ($words) {
			foreach ($words as $value) {
				$query->orWhere('first_name', 'like', "%{$value}%");
				$query->orWhere('last_name', 'like', "%{$value}%");
			}
		})
		->get();
		
		return view('welcome', ['doctors' => $doctors, 'route' => 'doctor.view']);
	}

	public function getDoctor($id = null) {
		if($id)
			$doctor = Doctor::find($id);
		
		return view('includes.doctorview',['doctor' => $doctor]);
	}

	public function deleteDoctor($id = null) {

		$doctor = Doctor::find($id);
		$filename = $doctor->image;
		//Delete existing file if it exists
		if(Storage::disk('local')->has($filename)) {
			Storage::delete($filename);
		}
		$doctor->delete();
		return redirect()->route('doctors')->with(['message' => 'Doctor successfully deleted.']);

	}

	
}