@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body mx-5">
                    <h1 class=" title mb-4 text-uppercase text-center fw-bold">
                        Ticket Platform
                    </h1>
                    <div class="row mb-5">
                        <div class="col text-container">
                            <p class="mb-4">
                                Monitora lo stato delle segnalazioni
                            </p>
                        </div>
                        <div class="col-6 ">
                            <img class="w-100 img-container"
                                src="https://www.studiopassantino.it/wp-content/uploads/2022/02/segnalazione-illeciti.jpg"
                                alt="">
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col text-container">
                            <div class="col-6 ">
                                <img class="w-100 img-container"
                                    src="https://techbusiness.it/wp-content/uploads/2018/09/Customer-Service-1.png"
                                    alt="">
                            </div>
                            <p class="mb-4">
                                Verifica la disponibilità degli operatori
                            </p>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col text-container">
                            <p class="mb-4">
                                Aggiorna lo status dei tickets
                            </p>
                        </div>
                        <div class="col-6 ">
                            <img class="w-100 img-container"
                                src="https://fluentsupport.com/wp-content/uploads/2022/06/Customer_satisfaction_Definition_importance__examples_01-1.jpg"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style lang="scss" scoped>
    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% {
            transform: translateY(0);
        }
        40% {
            transform: translateY(-10px);
        }
        60% {
            transform: translateY(-10px);
        }
    }

    .title {
        transition: 0.3s;
        animation: bounce 2s infinite;
    }

    .text-container {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        text-shadow: 0px 5px 20px rgba(0, 0, 0, 0.756);
        font-size: 30px;
        font-weight: 700;
        letter-spacing: 5px;
    }

    .img-container {
        border-radius: 10px;
    }
</style>
