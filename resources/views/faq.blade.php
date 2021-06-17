@extends('layouts.app')

@section('content')
  <div class="slider" id="slider">
        <!-- slider -->
       <div class="slider-img"><img src="images/banner_baru.png" alt="Borrow - Loan Company Website Template" class="">
            <div class="container">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="slider-captions">
                        <!-- slider-captions -->
                       
                        
                        </div>
                    <!-- /.slider-captions -->
                </div>
            </div>
        </div>
        <div>
             <div class="slider-img"><img src="images/banner_baru_2.png" alt="Borrow - Loan Company Website Template" class="" >
                <div class="container">
                    <div class=" col-xl-6 col-lg-6 col-md-12  col-sm-12 col-12">
                        <div class="slider-captions">
                            <!-- slider-captions -->
                            
                            </div>
                        <!-- /.slider-captions -->
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="slider-img"><img src="images/banner_baru_3.png" alt="Borrow - Loan Company Website Template" class="" >
                <div class="container">
                    <div class="col-xl-6 col-lg-6 col-md-12  col-sm-12 col-12">
                        <div class="slider-captions">
                            <!-- slider-captions -->
                           
                            </div>
                        <!-- /.slider-captions -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="container-faq bg-gradient">
        <div class="row">
            <div class="col-12 py-5 text-center">
                <h1>FAQ</h1>
            </div>
        </div>
    </div>

    <section>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-9">
                    <div id="accordion">
                        <div class="card">
                          <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                              <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Header 1
                              </button>
                            </h5>
                          </div>
                      
                          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                          </div>
                        </div>
                        <div class="card">
                          <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                               Header 2
                              </button>
                            </h5>
                          </div>
                          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                          </div>
                        </div>
                        <div class="card">
                          <div class="card-header" id="headingThree">
                            <h5 class="mb-0">
                              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Header 3
                              </button>
                            </h5>
                          </div>
                          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="card-body">
                              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </section>

@section('js')
   <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/slider-carousel.js')}}"></script>
    <script src="{{asset('js/service-carousel.js')}}"></script>

@endsection
@endsection
