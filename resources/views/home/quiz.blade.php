<x-app-layout>
    <x-slot name="header">{{$quiz->title}} - {{ __('Quiz\'i') }} </x-slot>
    <div class="sm:pt-14">
        <div class="col-md-6 mx-auto overflow-hidden bg-white shadow sm:rounded-lg">
            <div class="card-body md:px-5">
                <div class="card-title">
                    <h3>{{ __('Hazırsanız Quize başlayabilirsiniz')}}</h3>
                </div>
                <form action="{{ route('home.quiz.result',$quiz->slug) }}" method="post">
                    @csrf
                    @foreach ($quiz->quizList as $question)
                        <div class="list-group mb-2">
                            <div class="list-group-item" aria-current="true">
                                @if ($question->questionList->image)
                                    <div class="d-flex justify-content-between mt-2">
                                        <img src="{{asset($question->questionList->image)}}" class="mb-2 img-thumbnail">
                                    </div>
                                @endif
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mt-2 text-gray-600"><b>{{ $loop->iteration }}{{__(". Soru ")}}"{{$question->questionList->question}}"</b></h5>
                                </div>
                                <div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="{{$question->questionList->id}}" id="{{$question->questionList->id.'-answer1'}}" value="answer1">
                                        <label class="form-check-label" for="{{$question->questionList->id.'-answer1'}}">
                                            <p style="text-align: justify;" class="mb-2">{{$question->questionList->answer1}}</p>
                                        </label></input>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="{{$question->questionList->id}}" id="{{$question->questionList->id.'-answer2'}}" value="answer2" required>
                                        <label class="form-check-label" for="{{$question->questionList->id.'-answer2'}}">
                                            <p style="text-align: justify;" class="mb-2">{{$question->questionList->answer2}}</p>
                                        </label></input>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="{{$question->questionList->id}}" id="{{$question->questionList->id.'-answer3'}}" value="answer3" required>
                                        <label class="form-check-label" for="{{$question->questionList->id.'-answer3'}}">
                                            <p style="text-align: justify;" class="mb-2">{{$question->questionList->answer3}}</p>
                                        </label></input>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="{{$question->questionList->id}}" id="{{$question->questionList->id.'-answer4'}}" value="answer4" required>
                                        <label class="form-check-label" for="{{$question->questionList->id.'-answer4'}}">
                                            <p style="text-align: justify;" class="mb-2">{{$question->questionList->answer4}}</p>
                                        </label></input>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @if ($quiz->my_result)
                        <a href="{{route('home.quiz.detay',$quiz->slug)}}" type="submit" class="btn btn-secondary mb-3 float-end">Detaylara Dön&nbsp;<i class="overflow fa fa-share"></i></a>
                    @else
                        <button type="submit" class="btn btn-success mb-3 float-end">Quiz'i Tamamla</button>
                    @endif

                </form>
            </div>
        </div>
    </div>
</x-app-layout>

