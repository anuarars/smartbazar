@extends('layouts.admin')

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4>Комментарии</h4>

                        </div>
                        <div class="card-body p-0">
                            <div class="table">
                                <table class="table table-striped table-md">
                                    <thead>
                                    <tr>
                                        <th scope="col">Имя человека</th>
                                        <th scope="col">Комментарий</th>
                                        <th scope="col">Рейтинг</th>
                                        <th scope="col">Действие</th>
                                    </tr>
                                    </thead>
                                    @foreach ($reviews as $review)
                                        <tr>
                                            <td data-label="ИмяЧеловека">{{$review->user->firstname . " " . $review->user->lastname }}</td>
                                            <td data-label="Комментарий">{{$review->description}}</td>
                                            <td data-label="Рейтинг">{{$review->rate}}</td>
                                            <td data-label="Действие">
                                                <form action="{{route('review.destroy', $review)}}" method="post">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button class="btn btn-danger">Удалить</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            {{-- {{ $companies->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
