<div class="tab-pane" id="invest" role="tabpanel">
    <div class="row">
        <div class="col">
            <div class=" bg-white ">
                <div class="contact-form mb60">
                    <div class=" ">

                        <div class="row mt-2">
                            <h3>Pengajuan Pinjaman</h3>
                            <hr>

                            <table class="table table-striped table-bordered mt-4">
                                <thead>
                                    <tr>
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
                                            <td>{{$item->invoice_number}}</td>
                                            <td>Rp {{ number_format(($item->loan_amount + $item->admin_fee_amount) ,0,',','.') }}</td>
                                            <td><span class="label label-warning">{{$item->status_title }}</span></td>
                                            <td>{{date('Y-m-d' , strtotime($item->created_at))}}</td>
                                            <td></td>
                                            @if($item->status == '19')
                                                <td><a id="btnsign" href="/profile/sign/{{$item->invoice_number}}" class="btn btn-default btn-xs"> Tanda tangan <br> perjanjian </a></td>
                                            @elseif($item->status == '21')
                                                <td><a  href="/profile/loan/detail/{{$item->invoice_number}}" class="btn btn-default btn-xs"> detail </a></td>
                                            @elseif($item->status == '27')
                                                <td><button onclick="updated_status('{{$item->id}}','21')" href="#" class="btn btn-primary btn-xs"> Klik jika sudah diterima </button></td>
                                            @elseif($item->status == '28')
                                                <td><a href="/profile/congratulation/{{$item->invoice_number}}" class="btn btn-default btn-xs"> Konfirmasi </a></td>
                                            @else
                                                <td><button  href="#" class="btn btn-default btn-xs"> detail </button></td>
                                            @endif


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

        <div id="modal_agreement" class="modal fade" tabindex="-1" role="dialog" id="myModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Modal title</h4>
                    </div>
                    <div class="modal-body">
                        <p>One fine body&hellip;</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>
</div>
