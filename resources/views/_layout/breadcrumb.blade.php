@isset($breadcrumbs)
    <div class="row">
        <div class="col-12 mt-2">
            <div class="bg-[#62C3D0] px-2 py-2 rounded-[14px] mb-4 flex gap-2 shadow-[0_2px_8px_1px_rgba(152,152,152,0.2)]">
                @if ($title == 'Dashboard Seller')
                    <i class="fa-solid fa-store fa-xl self-center" style="color: #ffffff;"></i>
                @else
                    <a href="{{ url()->previous() }}" class="my-auto ms-1">
                        <i class="fas fa-xl fa-arrow-left text-white"></i>
                    </a>
                @endif
                {{-- <div class="bg-white w-5 h-5 self-center"></div> --}}
                <div class="flex justify-between px-2 w-full  pt-1 flex-wrap">
                    <h2 class="text-white font-poppins font-semibold" id="title"><?= $title ?></h2>
                    <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                        <ul class="breadcrumb pt-0">
                            @foreach ($breadcrumbs as $key => $value)
                                <li class="breadcrumb-item"><a href="{{ url($key) }}" class="text-white">{{ $value }}</a></li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- Title and Top Buttons Start -->
            <div class="page-title-container">
                <div class="row">
                    <!-- Top Buttons Start -->
                    <div class="col-12 col-sm-6 d-flex align-items-start justify-content-end">
                        <!-- Tour Button Start -->
                        <a href="/dashboard/seller" class="btn btn-outline-primary btn-icon btn-icon-end w-100 w-sm-auto">
                            <!-- <span>Menu Utama</span> -->
                            <i data-acorn-icon="home"></i>
                        </a>
                        &nbsp;
                        <a href="/dashboard/logout" class="btn btn-outline-primary btn-icon btn-icon-end w-100 w-sm-auto">
                            <!-- <span>Logout</span> -->
                            <i class="fa fa-sign-out-alt"></i>
                        </a>
                        &nbsp;
                        <!-- Tour Button End -->
                    </div>
                    <!-- Top Buttons End -->
                </div>
            </div>
            <!-- Title and Top Buttons End -->
        </div>
    </div>
@endisset
