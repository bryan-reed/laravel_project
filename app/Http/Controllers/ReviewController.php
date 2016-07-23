<?php
namespace App\Http\Controllers;

use App\Doctor;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
	public function submitReview(Request $request) {

		//Validate

		$doctor_id = $request['doctor_id'];
		$review_body = $request['review'];
		$name = $request['name'];
		$rating = $request['rating'];

		$review = new Review();
		$review->doctor_id = $doctor_id;
		$review->name = $name;
		$review->rating = $rating;
		$review->review = $review_body;

		$review->save();

		return redirect()->route('doctor.view', ['id' => $doctor_id]);
	}
}