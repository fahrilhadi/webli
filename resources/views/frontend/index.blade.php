@extends('frontend.master')

@section('frontend-title')
    WeBLI | Website Basic Listening Instruction
@endsection

@section('frontend-home-content')
    <!--================================
         START HERO AREA
    =================================-->
    @include('frontend.home.hero')
    <!--================================
            END HERO AREA
    =================================-->

    <!--======================================
        START ABOUT AREA
    ======================================-->
    @include('frontend.home.about')
    <!--======================================
            END ABOUT AREA
    ======================================-->
    
    <!--======================================
            START FEATURE AREA
    ======================================-->
    @include('frontend.home.feature')
    <!--======================================
            END FEATURE AREA
    ======================================-->
    
    <!--======================================
            START BENEFIT AREA
    ======================================-->
    @include('frontend.home.benefit')
    <!--======================================
            END BENEFIT AREA
    ======================================-->

    <!-- ================================
        START FAQ AREA
    ================================= -->
    @include('frontend.home.faq')
    <!-- ================================
        START FAQ AREA
    ================================= -->

    <!-- ================================
       START CONTACT AREA
    ================================= -->
    @include('frontend.home.contact')
    <!-- ================================
           END CONTACT AREA
    ================================= -->
    
    <div class="section-block"></div>
    
    <!--======================================
            START SUBSCRIBER AREA
    ======================================-->
    @include('frontend.home.subscribe')
    <!--======================================
            END SUBSCRIBER AREA
    ======================================-->
@endsection