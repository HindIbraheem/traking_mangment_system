<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
<x-header></x-header>

<style>
    .image-viewer {
        cursor: pointer;
    }

    .image-viewer-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: none;
    }

    .image-viewer-overlay .image-viewer-large {
        position: absolute;
        top: 50%;
        left: 50%;
        bottom:  50%;
        transform: translate(-50%, -50%);
        max-width: 80%;
        max-height: 80%;
        border: 10px solid #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    }

    .image-viewer-overlay:target {
        display: block;
    }

    .footer {
  visibility: visible;

}

/* Toggle footer visibility when image viewer overlay is displayed */
.image-viewer-overlay:target + .footer {
  visibility: hidden;
  display: none
}
</style>
<x-navigation></x-navigation>
<div class="mobile-menu-overlay"></div>


<div class="mobile-menu-overlay"></div>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row" dir="rtl" style="text-align: right">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4> كتب الشكر </h4>
                        </div>

                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"> بيانات الموظف </a></li>
                                <li class="breadcrumb-item active" aria-current="page"> بيانات العمل </li>
                            </ol>

                            @if (session("success"))
                                <div class="alert alert-success alert-dismissible fade show mt-15" role="alert">
                                    <strong> <i class="icon-copy dw dw-notification"></i> تهانينا <br></strong>
                                    {{ session("success") }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @elseif(session("failed"))
                                <div class="alert alert-danger alert-dismissible fade show mt-15" role="alert">
                                    <strong>للأسف!...</strong> {{ session("failed") }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        </nav>
                    </div>
                </div>
            </div>


            <!-- Export Datatable start -->
            <div class="card-box mb-30 ">
                <div class="pd-20">
                    {{-- <h4 class="text-blue h4">Data Table with Export Buttons</h4> --}}
                </div>
                <div class="pb-20 ">
                    <table class="table hover multiple-select-row data-table-export nowrap directionClass">
                        <thead>

                            <tr>
                                {{-- <th class="table-plus datatable-nosort">#</th> --}}
                                <th> نسخة من الكتاب </th>
                                <th> العدد </th>
                                <th> التاريخ </th>
                                <th> الجهة المانحة </th>
                                <th> موافقة مدير القسم </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Shoukur as $key => $value)
                                <tr>
                                    {{-- <td class="table-plus">{{ $key+1 }}</td> --}}

                                    {{-- <td><img src="../assets/shoukurs/images/{{ $value->book_image  }}"  width="150px"></td> --}}
                                    <td style="text-align: right">
                                        <img src="../assets/shoukurs/images/{{ $value->book_image }}" width="200px"
                                            class="image-viewer">
                                        <div class="image-viewer-overlay">
                                            <img src="../assets/shoukurs/images/{{ $value->book_image }}"
                                                class="image-viewer-large">
                                        </div>
                                    </td>

                                    <td>{{ $value->book_number }}</td>
                                    <td>{{ $value->book_date }}</td>
                                    <td>{{ $value->book_number }}</td>
                                    <td>{{ $value->book_destination }}</td>



                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Export Datatable End -->


            <x-footer class="footer"></x-footer>

            <script>
                // Get all image viewer elements
                const imageViewerElements = document.querySelectorAll('.image-viewer');

                // Add event listener to each image viewer element
                imageViewerElements.forEach((element) => {
                    element.addEventListener('click', () => {
                        // Get the overlay element
                        const overlayElement = element.nextElementSibling;
                        // Show the overlay element
                        overlayElement.style.display = 'block';
                        document.querySelector('.footer').style.visibility = 'hidden';

                    });
                });

                // Add event listener to the overlay element
                document.addEventListener('click', (event) => {
                    // Check if the click is outside the image viewer large element
                    if (event.target.classList.contains('image-viewer-overlay')) {
                        // Hide the overlay element
                        event.target.style.display = 'none';
                        document.querySelector('.footer').style.visibility = 'visible';
                    }
                });
            </script>
