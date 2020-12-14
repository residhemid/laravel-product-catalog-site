@extends('layouts.admin.amaster')
@section('title','Slider Sayfası')
@section('keywords','Slider Yönetim Sayfası')
@section('description','Slider Yönetim Sayfası')

@section('sidebar')
    @include('admin.sidebar')

@endsection

@section('content')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Slider Yönetimi</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin">Ana Sayfa</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Sliderler</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title m-b-0">Slider Listesi</h5>
                    </div>

                    <form  method="post" action="/admin/slider_listesi/toplusil" enctype="multipart/form-data">
                        <input  type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                        <div class="table-responsive">
                            <input id="toplu_silme_button" disabled onclick="return confirm('Seçtiğiniz sliderler silinsin mi?');" style="margin-left:10px;" class="btn btn-dark " type="submit" value="Seçilenleri sil" name="sub">
                    <a href="/admin/slider_ekleme" type="button" class="btn btn-success ">Slider Ekle</a>
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Seç
                                        </th>
                                        <th scope="col">Başlık</th>
                                        <th scope="col">Açıklama</th>
                                        <th scope="col">Resim</th>
                                        <th scope="col">Durum</th>
                                        <th style="text-align: center;" scope="col" colspan="2">İşlem</th>
                                    </tr>
                                </thead>
                                <tbody class="customtable">
                                    @foreach ($sliderler as $rs)
                                    <tr>
                                        <th>
                                            <label class="customcheckbox">
                                                <input onclick="check_is(this.value)" type="checkbox" class="listCheckbox" name="techno[]" value="{{ $rs->id }}" />
                                                <span class="checkmark"></span>
                                            </label>
                                        </th>

                                        <td>{{$rs->title }}</td>
                                        <td>{{$rs->description}}</td>
                                        <td><img  width="80px" height="50px;" style="border:1px solid #ccc;"src="/uploads/images/{{$rs->image}}"></td>
                                        <td>{{$rs->status}}</td>
                                        <td style="text-align: center;"><a  href="/admin/slider_duzenle/{{$rs->id}}"type="button" class="btn btn-info btn-sm">Düzenle</a></td>
                                        <td style="text-align: center;"><a onclick="return confirm('Slide Silinsinmi?');" href="/admin/slider/sil/{{$rs->id}}"type="button" class="btn btn-danger btn-sm">Sil</a></td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <footer class="footer text-center">
       Tüm hakları saklıdır  Toti-Admin. Bu admin paneli<a href="http://www.toti.com.tr/"> Toti Web Programlama </a>şirketi tarafından yapılmıştır.
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>
@endsection
