@extends('backend.master')

@section('content')
    <div id="content-wrapper">
        <div class="container-fluid">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Clients List
                    <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#clientModal">Add Client</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Company</th>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Service</th>
                                <th>Details</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>2011/04/25</td>
                                <td>$320,800</td>
                                <td>$320,800</td>
                                <td>$320,800</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--    Client Add Modal--}}
    <!-- Modal -->
    <div class="modal fade" id="clientModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Client</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('client.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Company Name</label>
                            <input type="text" name="company_name" class="form-control" placeholder="Company Name" required>
                            <span style="color: red"> {{ $errors->has('company_name') ? $errors->first('company_name') : ' ' }}</span>
                        </div>
                        <div class="form-group">
                            <label>Client Name</label>
                            <input type="text" name="client_name" class="form-control" placeholder="Client Name" required>
                            <span style="color: red"> {{ $errors->has('client_name') ? $errors->first('client_name') : ' ' }}</span>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Client Email" required>
                            <span style="color: red"> {{ $errors->has('email') ? $errors->first('email') : ' ' }}</span>
                        </div>
                        <div class="form-group">
                            <label>Contact number</label>
                            <input type="text" name="contact" class="form-control" placeholder="Contact Number" required>
                            <span style="color: red"> {{ $errors->has('contact') ? $errors->first('contact') : ' ' }}</span>
                        </div>
                        <div class="form-group">
                            <label>Service</label>
                            <select name="service" class="form-control">
                                <option value="immigration service">Immigration service</option>
                                <option value="company setup">Company setup</option>
                                <option value="trade name">Trade name</option>
                                <option value="moa">Moa</option>
                                <option value="office ejari">Office Ejari</option>
                                <option value="trade licenses">Trade licenses</option>
                                <option value="bank account">Bank Account</option>
                                <option value="pro service">PRO service</option>
                                <option value="labour service">Labour service</option>
                                <option value="ded service">DED service</option>
                            </select>
                            <span style="color: red"> {{ $errors->has('service') ? $errors->first('service') : ' ' }}</span>
                        </div>
                        <div class="form-group">
                            <label>License expiry date</label>
                            <input type="date" name="expiry_date" class="form-control" required>
                            <span style="color: red"> {{ $errors->has('expiry_date') ? $errors->first('expiry_date') : ' ' }}</span>
                        </div>
                        <div class="form-group">
                            <label>Add File</label>
                            <input type="file" name="photo" required>
                            <span style="color: red"> {{ $errors->has('photo') ? $errors->first('photo') : ' ' }}</span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
