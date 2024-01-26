@extends('layouts.app')
@section('title')
    {{__('messages.vcard.edit_vcard')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-end mb-5">
            <h1>{{__('messages.vcard.edit_vcard')}}</h1>
            <a class="btn btn-outline-primary float-end"
               href="{{ route('vcards.index') }}">{{ __('messages.common.back') }}</a>
        </div>
        <div class="col-12">
            @if(Session::has('success'))
                <p class="alert alert-success">{{ getSuccessMessage(Request::query('part')).Session::get('success') }}</p>
            @endif
            @if(Session::has('error'))
                <p class="alert alert-danger">{{ getSuccessMessage(Request::query('part')).Session::get('error') }}</p>
            @endif
            @include('layouts.errors')
            @include('flash::message')
        </div>
        <div class="card">
        <div class="card-body d-sm-flex position-relative">
        <div class="">
            <div class="">
        @include('vcards.sub_menu')
            </div>
         </div>
         <div class="ps-sm-3 pt-lg-auto pt-0 w-100 overflow-auto" id="main">
            <button class="openbtn d-lg-none d-block" onclick="openNav()"><svg class="svg-inline--fa fa-bars fs-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bars" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M0 96C0 78.33 14.33 64 32 64H416C433.7 64 448 78.33 448 96C448 113.7 433.7 128 416 128H32C14.33 128 0 113.7 0 96zM0 256C0 238.3 14.33 224 32 224H416C433.7 224 448 238.3 448 256C448 273.7 433.7 288 416 288H32C14.33 288 0 273.7 0 256zM416 448H32C14.33 448 0 433.7 0 416C0 398.3 14.33 384 32 384H416C433.7 384 448 398.3 448 416C448 433.7 433.7 448 416 448z"></path></svg></button>
        @if($partName !== 'services'&& $partName !=='products'&& $partName !=='testimonials' && $partName !=='galleries' && $partName !=='blogs')
                    @endif
                    {{ Form::hidden('is_true', Request::query('part') == 'business_hours',['id' => 'vcardCreateEditIsTrue']) }}
                    @if($partName != 'services' && $partName != 'blogs' && $partName != 'testimonials' && $partName != 'products' && $partName != 'galleries')
                    {!! Form::open(['route' => ['vcards.update', $vcard->id], 'id' => 'editForm', 'method' => 'put', 'files' => 'true']) !!}
                    @include('vcards.fields')
                    {{ Form::close() }}
                @else
                    @if($partName === 'blogs')
                        @include('vcards.blogs.index')
                    @elseif($partName === 'services')
                        @include('vcards.services.index')
                    @elseif($partName === 'products')
                        @include('vcards.products.index')
                    @elseif($partName === 'galleries')
                        @include('vcards.gallery.index')
                    @else
                        @include('vcards.testimonials.index')
                    @endif
                @endif
                @if($partName !== 'services'&& $partName !=='products'&& $partName !=='testimonials' && $partName !=='galleries' && $partName !=='blogs')
            </div>
        </div>
    </div>
        @endif
    </div>

@endsection
