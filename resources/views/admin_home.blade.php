<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Boxicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/f15b7da99a.js" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin-style.css')}}" />

    <title>YUPP REALTORS® | ADMIN HOME</title>
    <link rel="icon" href="images/yupp-logo.png" sizes="16x16 32x32" type="image/png" />
</head>

<body>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <span class="shrink-btn"></span>
        <a href="/admin">
            <div class="sidebar-top pt-4">
                <img src="images/yupp-logo-white.png" width="50%" alt="" />
            </div>
        </a>
        <div class="sidebar-links">
            <ul class="side-menu top">
                <li class="tooltip-element" data-tooltip="1">
                    <a href="#" class="menu-link" data-section="properties" data-active="1">
                        <i class="fa fa-solid fa-circle-info"></i>
                        <span class="text">Properties</span>
                    </a>
                </li>

                <li class="tooltip-element" data-tooltip="3">
                    <a href="#" class="menu-link" data-section="notif" data-active="3">
                        <i class="fa fa-solid fa-clock-rotate-left"></i>
                        <span class="text">Notifications</span>
                    </a>
                </li>
                <li class="tooltip-element" data-tooltip="7">
                    <a href="{{ route('user.account', ['id' => Auth::user()->id]) }}">
                        <button class="btn btn-danger log-out-btn" type="button" id="logout-btn ">
                            <i class="fa fa-solid fa-file-invoice"></i> Account
                        </button>
                    </a>
                </li>
                <li class="tooltip-element" data-tooltip="7">
                    <a href="/logout">
                        <button class="btn btn-danger log-out-btn" type="button" id="logout-btn ">
                            <i class="fa fa-solid fa-arrow-right-from-bracket"></i> Log out
                        </button>
                    </a>
                </li>
            </ul>

        </div>
    </section>
    <!-- SIDEBAR -->
    <!-- Reservation Modal -->

    <!-- Reservation Modal -->

    <!--  History Trips Modal -->

    <!-- History Trips Modal -->

    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->

        <nav>
            <a class="profile">
                <img src="../images/default_pp.png" />
                <p>Welcome, {{$s -> first_name}} {{$s -> last_name}}</p>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <button class="dropdown-item" type="button" id="logout-btn">
                        Log out
                    </button>
                </li>
            </ul>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="content">


                <section id="properties" class="section properties">
                    <form>
                        @csrf
                        <div class="form-group">
                            <label for="property_type">Select Property Type:</label>
                            <select class="form-control" id="property_type" name="property_type">
                                <option value="" disabled selected>Select</option>
                                <option value="house_and_lot">House and Lot</option>
                                <option value="condominium">Condominium</option>
                                <option value="lot_only">Lot Only</option>
                            </select>
                        </div>
                    </form>

                    <form id="house_and_lot_form" action="{{ route('addproperty') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <hr>
                        <h4 class="pt-3"><strong>Create New House and Lot</strong></h4>

                        <div class="form-group">
                            <div class="row hl_details">
                                <div class="col-lg-5">
                                    <label for="hl_address">Address:</label>
                                    <input type="text" class="form-control" name="hl_address" id="hl_address"
                                        placeholder="Enter Address" required />
                                </div>
                                <div class="col-lg-2">
                                    <label for="hl_price">Price:</label>
                                    <input type="number" class="form-control" name="hl_price" id="hl_price"
                                        placeholder="Enter price" min="0" required />
                                </div>
                                <div class="col-lg-1">
                                    <label for="hl_room">Room/s:</label>
                                    <input type="number" class="form-control" name="hl_room" id="hl_room"
                                        placeholder="Room/s" min="0" required />
                                </div>
                                <div class="col-lg-2">
                                    <label for="hl_tb">Toilet/s & Bath/s:</label>
                                    <input type="number" class="form-control" name="hl_tb" id="hl_tb"
                                        placeholder="toilet & bath" min="0" required />
                                </div>
                                <div class="col-lg-1">
                                    <label for="hl_lot_area">Lot Area:</label>
                                    <input type="number" class="form-control" name="hl_lot_area" id="hl_lot_area"
                                        placeholder="Lot area" min="0" required />
                                </div>
                                <div class="col-lg-1">
                                    <label for="hl_floor_area">Floor Area:</label>
                                    <input type="number" class="form-control" name="hl_floor_area" id="hl_floor_area"
                                        placeholder="Floor area" min="0" required />
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="property_images">Add Images:</label>
                            <input type="file" class="form-control" name="property_images[]" id="property_images"
                                multiple required>
                        </div>
                        <div class="pt-3 ">
                            <input class="btn btn-danger" value="Create" type="submit" style="width: 10%;">
                        </div>

                        <hr>

                        <h4 class="pt-3"><strong>House and Lot List</strong></h4>
                        <input type="text" class="form-control" name="hl_title" id="hl_title" value="House_and_Lot"
                            hidden />
                        <table class="table">
                            <tr>
                                <th>Address</th>
                                <th>Price</th>
                                <th class="text-center">Room</th>
                                <th class="text-center">Toilet & Bath</th>
                                <th class="text-center">Lot Area</th>
                                <th class="text-center">Floor Area</th>
                                <th class="text-center">View Property</th>
                            </tr>
                            @foreach ($property as $p)
                            <tr>
                                <td>{{$p->address}}</td>
                                <td>₱{{number_format($p->price)}}</td>
                                <td class="text-center">{{$p->room}}</td>
                                <td class="text-center">{{$p->tb}}</td>
                                <td class="text-center">{{$p->lot_area}}</td>
                                <td class="text-center">{{$p->floor_area}}</td>
                                <td class="text-center"><a href="/admin/hl/{{$p->id}}" class="btn btn-danger"
                                        target="_blank" style="width: 75%;">View</a></td>
                            </tr>
                            @endforeach
                        </table>



                    </form>


                    <form id="condominium_form" action="{{ route('addpropertycondo') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <hr>
                        <h4 class="pt-3"><strong>Create New Condominium</strong></h4>

                        <div class="form-group">
                            <div class="row c_details">
                                <div class="col-lg-7">
                                    <label for="c_address">Address:</label>
                                    <input type="text" class="form-control" name="c_address" id="c_address"
                                        placeholder="Enter Address" required />
                                </div>
                                <div class="col-lg-3">
                                    <label for="c_price">Price:</label>
                                    <input type="number" class="form-control" name="c_price" id="c_price"
                                        placeholder="Enter price" min="0" required />
                                </div>

                                <div class="col-lg-2">
                                    <label for="c_floor_area">Floor Area:</label>
                                    <input type="number" class="form-control" name="c_floor_area" id="c_floor_area"
                                        placeholder="Floor area" min="0" required />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="c_property_images">Add Images:</label>
                            <input type="file" class="form-control" name="c_property_images[]" id="c_property_images"
                                multiple required>
                        </div>
                        <div class="pt-3 ">
                            <input class="btn btn-danger" value="Create" type="submit" style="width: 10%;">
                        </div>

                        <hr>

                        <h4 class="pt-3"><strong>Condominium List</strong></h4>
                        <input type="text" class="form-control" name="c_title" id="c_title" value="Condominium"
                            hidden />
                        <table class="table">
                            <tr>
                                <th>Address</th>
                                <th class="ps-3">Price</th>
                                <th class="text-center ps-3">Floor Area</th>
                                <th class="text-center ps-3">View Property</th>
                            </tr>
                            @foreach ($propertycondo as $pc)
                            <tr>
                                <td>{{$pc->condo_address}}</td>
                                <td class="ps-3">₱{{number_format($pc->condo_price)}}</td>
                                <td class="text-center ps-3">{{$pc->condo_floor_area}}</td>
                                <td class="text-center ps-3 btn-danger"><a href="/admin/condo/{{$pc->condo_id}}"
                                        class="btn btn-danger" target="_blank" style="width: 100%">View</a></td>
                            </tr>
                            @endforeach
                        </table>

                    </form>

                    <form id="lot_only_form" action="{{ route('addpropertylot') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <hr>
                        <h4 class="pt-3"><strong>Create New Lot</strong></h4>

                        <div class="form-group">
                            <div class="row lot_details">
                                <div class="col-lg-7">
                                    <label for="lot_address">Address:</label>
                                    <input type="text" class="form-control" name="lot_address" id="lot_address"
                                        placeholder="Enter Address" required />
                                </div>
                                <div class="col-lg-3">
                                    <label for="lot_price">Price:</label>
                                    <input type="number" class="form-control" name="lot_price" id="lot_price"
                                        placeholder="Enter price" min="0" required />
                                </div>

                                <div class="col-lg-2">
                                    <label for="lot_area">Lot Area:</label>
                                    <input type="number" class="form-control" name="lot_area" id="lot_area"
                                        placeholder="Lot area" min="0" required />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lot_property_images">Add Images:</label>
                            <input type="file" class="form-control" name="lot_property_images[]"
                                id="lot_property_images" multiple required>
                        </div>
                        <div class="pt-3 ">
                            <input class="btn btn-danger" value="Create" type="submit" style="width: 10%;">
                        </div>

                        <hr>

                        <h4 class="pt-3"><strong>Lot List</strong></h4>
                        <input type="text" class="form-control" name="lot_title" id="lot_title" value="lot_only"
                            hidden />


                        <div class="col-lg-12">
                            <table class="table">
                                <tr>
                                    <th>Address</th>
                                    <th>Price</th>
                                    <th class="text-center">Lot Area</th>
                                    <th class="text-center">View Property</th>
                                </tr>
                                @foreach ($propertylot as $pl)
                                <tr>
                                    <td>{{$pl->lot_address}}</td>
                                    <td>₱{{number_format($pl->lot_price)}}</td>
                                    <td class="text-center">{{$pl->lot_area}}</td>
                                    <td class="text-center"><a href="/admin/lot/{{$pl->lot_id}}" class="btn btn-danger"
                                            target="_blank" style="width: 75%">View</a></td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </form>



                </section>

                <section id="accounts" class="section accounts">
                    <h1>Accounts</h1>
                </section>

                <section id="notif" class="section notif">
                    <table class="table">
                        <h1 class="text-center pb-4">Request Tours/ Site Tours</h1>
                        <thead>
                            <tr>
                                <th class="text-center">Name</th>
                                <th class="text-center">Contact Number</th>
                                <th class="text-center">E-mail</th>
                                <th class="text-center">Address</th>
                                <th class="text-center">Property Type</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Time</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Confirm</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($scheduledTours as $tour)

                            <tr>
                                <td class="text-center">{{ $tour->name }}</td>
                                <td class="text-center">{{ $tour->tour_contact_number }}</td>
                                <td class="text-center">{{ $tour->email }}</td>
                                <td class="text-center">{{ $tour->address }}</td>
                                <td class="text-center">{{ str_replace ('_',' ',$tour->type) }}</td>
                                <td class="text-center">{{ \Carbon\Carbon::parse($tour->tour_date)->format('M d,
                                    Y')
                                    }}</td>
                                <td class="text-center">{{ \Carbon\Carbon::parse($tour->tour_time)->format('h:i
                                    A')
                                    }}</td>
                                <td class="text-center">
                                    @if ($tour->confirmation)
                                    <span class="confirmed-status">Confirmed</span>
                                    @else
                                    <span class="not-confirmed-status">Not Confirmed</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($tour->confirmation)

                                    <form action="{{ route('confirmTour', ['id' => $tour->id]) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <button type="submit" class="btn btn-danger">Cancel</button>
                                    </form>
                                    @else

                                    <form action="{{ route('confirmTour', ['id' => $tour->id]) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <button type="submit" class="btn btn-primary">Confirm</button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @foreach ($scheduledCondoTours as $tour)
                            <tr>
                                <td class="text-center">{{ $tour->name }}</td>
                                <td class="text-center">{{ $tour->tour_contact_number }}</td>
                                <td class="text-center">{{ $tour->email }}</td>
                                <td class="text-center">{{ $tour->condo_address }}</td>
                                <td class="text-center">{{ str_replace('_', ' ', $tour->condo_type) }}</td>
                                <td class="text-center">{{ \Carbon\Carbon::parse($tour->tour_date)->format('M d,
                                    Y')
                                    }}</td>
                                <td class="text-center">{{ \Carbon\Carbon::parse($tour->tour_time)->format('h:i
                                    A')
                                    }}</td>
                                <td class="text-center">
                                    @if ($tour->confirmation)
                                    <span class="confirmed-status">Confirmed</span>
                                    @else
                                    <span class="not-confirmed-status">Not Confirmed</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($tour->confirmation)

                                    <form action="{{ route('confirmTour', ['id' => $tour->id]) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <button type="submit" class="btn btn-danger">Cancel</button>
                                    </form>
                                    @else

                                    <form action="{{ route('confirmTour', ['id' => $tour->id]) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <button type="submit" class="btn btn-primary">Confirm</button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @foreach ($scheduledLotTours as $tour)
                            <tr>
                                <td class="text-center">{{ $tour->name }}</td>
                                <td class="text-center">{{ $tour->tour_contact_number }}</td>
                                <td class="text-center">{{ $tour->email }}</td>
                                <td class="text-center">{{ $tour->lot_address }}</td>
                                <td class="text-center">{{ ucwords(str_replace('_', ' ', $tour->lot_type)) }}
                                </td>
                                <td class="text-center">{{ \Carbon\Carbon::parse($tour->tour_date)->format('M d,
                                    Y')
                                    }}</td>
                                <td class="text-center">{{ \Carbon\Carbon::parse($tour->tour_time)->format('h:i
                                    A')
                                    }}</td>
                                <td class="text-center">status</td>
                                <td class="text-center">
                                    @if ($tour->confirmation)
                                    <span class="confirmed-status">Confirmed</span>
                                    @else
                                    <span class="not-confirmed-status">Not Confirmed</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($tour->confirmation)

                                    <form action="{{ route('confirmTour', ['id' => $tour->id]) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <button type="submit" class="btn btn-danger">Cancel</button>
                                    </form>
                                    @else

                                    <form action="{{ route('confirmTour', ['id' => $tour->id]) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <button type="submit" class="btn btn-primary">Confirm</button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>


                    </form>

                </section>


            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->
    <script src="https://kit.fontawesome.com/f15b7da99a.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{ asset('js/adminHome.js')}}"></script>

    @include('layouts/errors')

</body>

</html>