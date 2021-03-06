<?php

namespace App\Http\Controllers;

use App\Http\Requests\AskQuestionRequest;
use App\Question;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::with('user')->latest()->paginate(5);

        return view('questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $question = new Question;

        return  view('questions.create', compact('question'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AskQuestionRequest $request)
    {
        $request->user()->questions()->create($request->only('title', 'body'));

        return redirect()->route('questions.index')->with('success', 'Your question has been submitted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        $question->increment('views');
        return view('questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        /**
         * Using Policies
         */

        $this->authorize('update', $question);

        /**
         * Using Gate
         */
        // if (\Gate::denies('update-question', $question)) {
        //     abort(403, 'Access denied');
        // }
        return view('questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AskQuestionRequest $request, Question $question)
    {
        /**
         * Using Policies
         */

        $this->authorize('update', $question);

        /**
         * Using Gate
         */

        // if (\Gate::denies('update-question', $question)) {
        //     abort(403, 'Access denied');
        // }

        $question->update($request->only('title', 'body'));

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Your question has been updated.',
                'body_html' => $question->body_html
            ]);
        }

        return redirect()->route('questions.index')->with('success', 'Your question has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        /**
         * Using Policies
         */

        $this->authorize('delete', $question);

        /**
         * Using Gate
         */

        // if (\Gate::denies('delete-question', $question)) {
        //     abort(403, 'Access denied');
        // }

        $question->delete();

        if (request()->expectsJson()) {
            return response()->json([
                'message' => 'Your question has been deleted successfully.'
            ]);
        }
        return redirect('/questions')->with('success', 'Your question has been deleted successfully.');
    }
}