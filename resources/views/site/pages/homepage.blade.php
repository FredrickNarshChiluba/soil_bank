@extends('site.app')
@section('title', 'E-SOIL DATA BANK')
@section('content')

<section class="section-pagetop bg-dark">
    <div class="container clearfix">
        <h2 class="title-page">E-SOIL DATA BANK</h2>
    </div>
</section>

<section class="section-content bg padding-y border-top">
<article class="card-body">
    <div class="container">
        <div class="row">
        <p>
           Presently, soil analysis and interpretation of soil test results is paper based. 
           This in one way or another has contributed to poor interpretation of soil test results which has resulted into poor recommendation of crops, soil amendments and fertilizers to farmers thus leading to poor crop yields, micro-nutrient deficiencies in soil and excessive or less application of fertilizers.
           </p> <p> The system to be designed will enable researchers and farmers with a convenient tool to analyze and interpret soil test data, selecting crops as well as determining the amount of fertilizer application rates required to optimize the yield of a particular crop which has the potential to increase crop yields and results in greater profits for the farmer.

           </p>
           <p>
           To develop a computer based soil-crop analysis system that analyses results of soil tests and underlying conditions in order to recommend ideal crops to be grown there, possible outcome yields and recommend the right fertilizers to be applied to the soil.
           </p>
           <p>
           Presently, soil analysis and interpretation of soil test results is paper based. 
           This in one way or another has contributed to poor interpretation of soil test results which has resulted into poor recommendation of crops, soil amendments and fertilizers to farmers thus leading to poor crop yields, micro-nutrient deficiencies in soil and excessive or less application of fertilizers.
           </p>
           <p> The system to be designed will enable researchers and farmers with a convenient tool to analyze and interpret soil test data, selecting crops as well as determining the amount of fertilizer application rates required to optimize the yield of a particular crop which has the potential to increase crop yields and results in greater profits for the farmer.

           </p>
        </div>
       
   </div>
   </article>
   <div id="layoutAuthentication_footer">
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; E-SOIL DATA BANK {{now()->format( 'Y')}}</div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
                <div ><a target="_blank" href="https://billbrain.tech/">powered by Billbrain techenologies ltd</a></div>
            </div>
        </div>
    </footer>
</div>
</section>


@stop

