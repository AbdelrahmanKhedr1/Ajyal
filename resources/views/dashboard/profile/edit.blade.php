@extends('layouts.master')
@section('title')
    edit Profile
@endsection
@section('css')
@endsection
@section('content')
    <!-- Breadcrumb start -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Account Settings</li>
    </ol>
    <!-- Breadcrumb end -->
    <br>
    <!-- Row start -->
    <div class="row gutters">
        <div class="col-lg-3 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="account-settings">
                        <div class="user-profile">
                            <div class="user-avatar">
                                <img src="{{ URL::asset('img/user7.png') }}" alt="Admin Templates and Dashboards" />
                            </div>
                            <h5 class="user-name">{{ Auth::user()->name }}</h5>
                            <h6 class="user-email">{{ Auth::user()->email }}</h6>
                        </div>
                        <div class="about">
                            <h5>About</h5>
                            <p>I'm Yuki. Full Stack Designer I enjoy creating user-centric, delightful and human
                                experiences.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body">
                    <form action="{{ route('dashboard.profile.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <x-forms.errors />

                        <div class="form-row">
                            <div class="col-md-6">
                                <x-forms.input label="First Name" type="text" name="first_name" :value="$user->profile->first_name ??  Auth::user()->name "
                                    placeholder="Enter First Name" />
                            </div>
                            <div class="col-md-6">
                                <x-forms.input label="Last Name" type="text" name="last_name" :value="$user->profile->last_name"
                                    placeholder="Enter Last Name" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <x-forms.input label="Phone" type="text" name="phone" :value="$user->profile->phone"
                                    placeholder="Enter Phone" />
                            </div>
                            <div class="col-md-6">
                                <x-forms.input label="Birthday" type="date" name="birthday" :value="$user->profile->birthday"
                                    placeholder="Enter Birthday" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <x-forms.input label="Street Address" type="text" name="street_address" :value="$user->profile->street_address"
                                    placeholder="Enter Street Address" />
                            </div>
                            <div class="col-md-6">
                                <x-forms.input label="City" type="text" name="city" :value="$user->profile->city"
                                    placeholder="Enter City" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <x-forms.input label="State" type="text" name="state" :value="$user->profile->state"
                                    placeholder="Enter State" />
                            </div>
                            <div class="col-md-6">
                                <x-forms.input label="Postal Code" type="text" name="postal_code" :value="$user->profile->postal_code"
                                    placeholder="Enter Postal Code" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <x-forms.select-intl label="Country" :options="$countries" name="country" :selected="$user->profile->country" />
                            </div>
                            <div class="col-md-6">
                                <x-forms.select-intl label="Locale" :options="$locales" name="locale" :selected="$user->profile->locale" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <x-forms.radio label="Gender" name="gender" :checked="$user->profile->gender" :options="['male' => 'Male', 'female' => 'Female']" />
                            </div>

                            <div class="col-sm-6">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Row end -->
@endsection
@section('js')
@endsection
