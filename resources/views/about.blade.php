@extends('layouts.app')

@section('content')
    <div class="container mt-5">
    @auth
        <h2>About This Project</h2>
        
        
<p>
    Welcome to my project! This web application is built with Laravel, a powerful PHP framework.
    It includes basic CRUD (Create, Read, Update, Delete) functionality for managing FAQ categories and questions.
    I created this website to simplify the job search process for students and facilitate quick communication.
    Many times, when students apply to job vacancies, they don't receive timely responses. This platform aims to connect students with job opportunities more efficiently.
</p>

        <h3>Sources</h3>
        <ul>
            <li>
                <a href="https://kinsta.com/fr/blog/crud-laravel/" target="_blank">CRUD in Laravel - Kinsta</a>
            </li>
            <li>
                <a href="https://www.youtube.com/watch?v=w78S90xSvuA&ab_channel=WebTechKnowledge" target="_blank">WebTechKnowledge YouTube Tutorial</a>
            </li>
            <li>
                <a href="https://www.youtube.com/watch?v=laC82_53E3A&ab_channel=SharmaCoder" target="_blank">SharmaCoder YouTube Tutorial</a>
            </li>
            <li>
                <a href="https://www.youtube.com/watch?v=yyHeqTZEINU&ab_channel=EasyLearning" target="_blank">EasyLearning YouTube Tutorial</a>
            </li>
            <li>
                <a href="https://openai.com" target="_blank">OpenAI - GPT Models</a>

            </li>
            <li>
                <a href="https://laravel.com/docs/10.x/installation" target="_blank">Laravel documentation</a>
            </li>
            <li>
                <a href="https://www.youtube.com/watch?v=hFm4xe0ej_I&ab_channel=LaravelJutsu" target="_blank">Middleware</a>
            </li>
            <li>
                <a href="https://github.com/Adil11000/adil_rajouai_bw.git" target="_blank">Github</a>
            </li>
        </ul>

        @endauth
    </div>
@endsection
