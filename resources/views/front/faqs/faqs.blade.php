@extends('front.layout.pages.indexPages')
@section('css')
    <style type="text/css">
        .panel {
            padding: 13px;
        }

        .panel-title {
            font-size: 16px;
            color: #333;
        }

        .panel-heading {
            border: 1px solid #ddd;
        }

        .card-header {
            background: #fff;
        }

        .color-333 {
            color: #333 !important;
        }

        .accordion>.card .card-header {
            margin-bottom: unset;
        }

        .card-header {
            border-radius: 0px;
            border: 1px solid #ddd;
        }

        .card {
            border: none;
            border-radius: 0px;
            margin-bottom: 13px;
        }

        .card-body {
            border: 1px solid #ddd;
            border-top: none;
        }
.red-circle {
  border-radius: 50% !important
}
    </style>
    <link rel="stylesheet" href="{{asset('assets/css/faq.css')}}" />

@endsection
@section('content_page')
    <div class="col-12 px-0" style="min-height:70vh">
        <div class="col-12 px-0 row main-nafez-box-styles">
            <div class="accordion col-12 px-0 row px-0" id="accordionExample">
                <div class="col-12 pt-4 mb-lg-4">
                    <h3 class="font-lg-3 font-0 mb-3 mb-lg-0 px-0"><span class="fas fa-circle font-1"
                            style="color:var(--bg-color-3);"></span>
                        أسئلة عامة :</h3>
                </div>
                @foreach ($faqs as $faq)
                    <div class="col-12 px-0">
                        <div class="card px-1  mb-2">
                            <div class="card-header border-0 btn  px-2 py-1" id="headingOne"
                                style="background: var(--bg-second-bg);">
                                <h5 class="mb-0">
                                    <span class=" row d-flex col-12  kufi collapsed font-lg-2 font-1 p-2" type="button"
                                        data-toggle="collapse" data-target="#s300" aria-expanded="true" aria-controls="s300"
                                        style="color: var(--bg-color-0)!important">
                                        <div class="col px-0" style="line-height:1.8">
                                            {{ $faq->question_ar }}
                                        </div>
                                        <div class="col-1 text-left px-0">
                                            <span class="fas fa-angle-down font-3"></span>
                                        </div>
                                    </span>
                                </h5>
                            </div>
                            <div id="s300" class="collapse" aria-labelledby="headingOne">
                                <div class="card-body naskh border-top border-0" style="line-height:1.8">
                                    {!! $faq->answer_ar !!}
                                </div>
                            </div>
                        </div>
                        <div class="nafezly-divider-right m-0"></div>

                    </div>
                @endforeach






            </div>
        </div>
    </div>
@endsection
