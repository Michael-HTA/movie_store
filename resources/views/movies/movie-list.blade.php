<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="movies"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Movies"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid pt-2 pb-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Movies Table</h6>
                            </div>
                        </div>
                        <div class=" me-3 mt-3 text-end">
                            <a class="btn bg-gradient-dark mb-0" href="{{route('movies.create')}}"><i
                                    class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New
                                Movie</a>
                        </div>
                        <div class="card-body pt-1 px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                ID
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                                TITLE</th>

                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                TYPE</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                RELEASE_DATE
                                            </th>
                                            <th
                                                class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                                RATING</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($movies as $movie )
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <p class="mb-0 text-sm">{{$movie->id}}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $movie->title }}</h6>
                                                </div>
                                            </td>

                                            <td class="align-middle text-center text-sm">
                                                <p class="text-xs text-secondary mb-0">
                                                    {{ $movie->Type->name }}
                                                </p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $movie->release ?? '2025 1 2' }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $movie->rating }}
                                                </span>
                                            </td>
                                            <td class="align-middle d-flex">
                                                <a rel="tooltip" class="btn btn-success btn-link"
                                                    href="{{ route('movies.edit', $movie->id) }}"
                                                    data-original-title="" title="">
                                                    <i class="material-icons">edit</i>
                                                    <div class="ripple-container"></div>
                                                </a>

                                                <form method="POST"
                                                    action="{{ route('movies.destroy', $movie->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-link"
                                                        onclick="if(!confirm('Are you sure to delete')){event.preventDefault()}"
                                                        style="margin-left: 5px">
                                                        <i class="material-icons">close</i>
                                                        <div class="ripple-container"></div>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                                {{-- paginate --}}
                                <div class="">
                                    {{$movies->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <x-footers.auth></x-footers.auth> --}}
        </div>
    </main>

</x-layout>
