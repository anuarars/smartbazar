@extends('layouts.seller')

@section('content')
    <form action="{{ route('seller.company.profile.update') }}" method="post">
    @method('PUT')
    @csrf
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="mt-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="profile-img">
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                                        <div class="file btn btn-lg btn-primary">
                                            Change Photo
                                            <input type="file" name="file"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="profile-head">
                                                <h5>
                                                    {{Auth::user()->lastname}} {{Auth::user()->firstname}}
                                                </h5>
                                                <h6>
                                                    Web Developer and Designer
                                                </h6>
                                                <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-primary" type="submit">Изменить</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="profile-work">
                                        <p>WORK LINK</p>
                                        <a href="">Website Link</a><br/>
                                        <a href="">Bootsnipp Profile</a><br/>
                                        <a href="">Bootply Profile</a>
                                        <p>SKILLS</p>
                                        <a href="">Web Designer</a><br/>
                                        <a href="">Web Developer</a><br/>
                                        <a href="">WordPress</a><br/>
                                        <a href="">WooCommerce</a><br/>
                                        <a href="">PHP, .Net</a><br/>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="tab-content profile-tab" id="myTabContent">
                                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                                    <div class="form-group row">
                                                        <div class="col-md-6">
                                                            <label>Company name</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text" name="name" class="form-control" value="{{ $company->name }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-6">
                                                            <label>Company code</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text" name="code" class="form-control" value="{{ $company->code }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-6">
                                                            <label>Email</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text" name="email" class="form-control" value="{{ $company->email }}" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-6">
                                                            <label>Phone</label>
                                                        </div>
                                                        <div class="input-group col-md-3">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-phone"></i>
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control phone-number" name="phone" value="{{ $company->phone }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-6">
                                                            <label>City</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text" name="city" class="form-control" value="{{ $company->city }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-6">
                                                            <label>Street</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text" name="street" class="form-control" value="{{ $company->street }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-6">
                                                            <label>Home</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text" name="home" class="form-control" value="{{ $company->home }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-6">
                                                            <label>Unit</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text" name="unit" class="form-control" value="{{ $company->unit }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-6">
                                                            <label>Description</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <textarea name="description" class="form-control">
                                                            {{ $company->description }}
                                                            </textarea>
                                                        </div>
                                                    </div>

                                        </div>
                                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Experience</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>Expert</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Hourly Rate</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>10$/hr</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Total Projects</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>230</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>English Level</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>Expert</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Availability</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>6 months</p>
                                                        </div>
                                                    </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>Your Bio</label><br/>
                                                    <p>Your detail description</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </form>
@endsection
