<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Debate;
use App\Repositories\QuestionRepository;
use App\Repositories\ResponseRepository;
use App\User;

class HomeController extends Controller
{
    private $questionRepository;
    private $responseRepository;

    public function __construct(QuestionRepository $questionRepository, ResponseRepository $responseRepository)
    {
        $this->questionRepository = $questionRepository;
        $this->responseRepository = $responseRepository;
    }

    public function welcome()
    {
        $actions_count = Action::count();
        $users_count = User::count();
        $question = $this->questionRepository->randomQuestion();
        $next_response = $this->responseRepository->randomResponse($question);
        return view('welcome', compact('actions_count', 'users_count', 'next_response'));
    }

    public function data()
    {
        return view('data');
    }

    public function download()
    {
        return response()->download(storage_path("app/public/actions" . date("Ymd") . ".csv"));
    }

    public function faq()
    {
        return view('faq');
    }

    public function legal()
    {
        return view('legal');
    }

    public function index()
    {
        $debates = Debate::orderBy('id')->get();
        $question = $this->questionRepository->randomQuestion();
        $next_response = $this->responseRepository->randomResponse($question);
        return view('home', compact('debates', 'next_response'));
    }
}
