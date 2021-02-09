@extends('layouts.app')

@section('content')
<style>
    li {
        margin:15px;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1 style="margin-top:50px; margin-bottom:15px;text-align:center;font-family: 'Poppins', sans-serif; font-size:35px; font-weight:bold;">Termat dhe Kushtet e perdorimit te aplikacionit</h1>
            <div class="row" style="margin-top:50px;">     
            
                <div class="col-md-12 col-sm-12" style="margin-bottom:20px;">
                    <div class="card" style="min-height:371px;border:10px;border-color:#ff4747;">
                        <div class="card-body">
                            <h2 style="font-family: 'Poppins', sans-serif; font-size:16px; font-weight:bold;">Nese deshironi te vazhdoni ne perdorimin e aplikacionit duhet te pranoni kushtet dhe termet e definuara me poshte:</h2>
                            <ol style="font-family: 'Poppins', sans-serif; font-size:16px; margin-top:30px;margin-left:30px;">
                                <li>Cdo produkt i cili publikohet nga ana e juaj duhet qe te jet i ekzistueshem dhe i gatshem per shitje.</li>
                                <li>Produktet e shitura duhet te dergohen tek klienti nga ana juaj, ne rast se nuk ka dergese te produktit ateher do te duhet te ktheni parate e marra nga klienti brenda 48 oreve.</li>
                                <li>Produktet e publikuara do te kene perqindje tek krijuesit e aplikacionit ashtu qe cmimi nvaret nga plani qe do zgjedhni.</li>
                                <li>Informatat e marra te klientit ( addresa, email-at, emri, mbiemri ) nuk duhet qe te keqperdoren. Shfrytzimi i tyre duhet te jete sa me i sakte dhe per cdo keqperdorim te vogel do te ndeshkoheni nepermjet ligjit te RMV.</li>
                                <li>Pagesa per barjen e produktit do te jete e mbuluar nga ana kompanise tone ashtu qe 2 dollar ne cdo bartje qe nuk tejkalon shumen prej 5 dollaresh.</li>
                            </ol>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
