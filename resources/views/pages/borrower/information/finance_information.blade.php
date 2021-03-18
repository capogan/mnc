<div class="tab-pane" id="invest" role="tabpanel">
    <div class="row">
        <div class="col">
            <div class=" bg-white ">
                <div class="contact-form mb60">
                    <div class=" ">

                        <div class="row mt-2">
                            <h3>Pengajuan Pinjaman</h3>
                            <hr>

                            <table class="table table-bordered mt-4">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nomor Invoice</th>
                                        <th>Pinjaman diajukan</th>
                                        <th>Status Pinjaman</th>
                                        <th>Tanggal Permintaan</th>
                                        <th>Tanggal disetujui</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($request_loan)
                                    @foreach($request_loan as $item)
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>{{$item->invoice_number}}</td>
                                            <td>Rp {{ number_format(($item->loan_amount + $item->admin_fee_amount) ,0,',','.') }}</td>
                                            <td><span class="label label-warning">{{Utils::convert_status($item->status) }}</span></td>
                                            <td>{{date('Y-m-d' , strtotime($item->created_at))}}</td>
                                            <td></td>
                                            <td><a href="#" class="btn btn-default btn-xs"> Detail </a></td>
                                        </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
                <!-- /.section title start-->
            </div>

        </div>
    </div>
</div>
