@extends('Admin.layout')

@section('konten')
    <div class="container-fluid ">
        <div class="col-12">
        <div class="row mb-2">
                <div class="card col-12 p-2">
                     <div class="row-3">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#disposisiModal">
                                    Disposisi
                            </button>

                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#penanggung_jawabModal">
                                    Pilih Penanggung Jawab
                            </button>
                     </div>       
                </div>
               
        </div>
        <div class="row">
          
                <div class="card">
                        <div class="invoice p-3 mb-3">
    
                                <!-- title row -->
    
                                <div class="row">
                                  <div class="col-12">
                                    <h4>
                                      <i class=""></i> Formulir Permintaan
                                      <small class="float-right"></small>
                                    </h4>
                                  </div>
                                  <!-- /.col -->
                                </div>
                                <!-- info row -->
                                <div class="row invoice-info">
                                  
                                  <!-- /.col -->
                                  <div class="col-sm-4 invoice-col">
                                    To
                                    <address>
                                      <strong>John Doe</strong><br>
                                      795 Folsom Ave, Suite 600<br>
                                      San Francisco, CA 94107<br>
                                      Phone: (555) 539-1037<br>
                                      Email: john.doe@example.com
                                    </address>
                                  </div>
                                  <!-- /.col -->
                                  <div class="col-sm-4 invoice-col">
                                    <b>Invoice #007612</b><br>
                                    <br>
                                    <b>Order ID:</b> 4F3S8J<br>
                                    <b>Payment Due:</b> 2/22/2014<br>
                                    <b>Account:</b> 968-34567
                                  </div>
                                  <!-- /.col -->
                                </div>
                                <!-- /.row -->
                  
                                <!-- Table row -->
                                <div class="row">
                                  <div class="col-12 table-responsive">
                                    <table class="table table-striped">
                                      <thead>
                                      <tr>
                                        <th>Qty</th>
                                        <th>Product</th>
                                        <th>Serial #</th>
                                        <th>Description</th>
                                        <th>Subtotal</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      <tr>
                                        <td>1</td>
                                        <td>Call of Duty</td>
                                        <td>455-981-221</td>
                                        <td>El snort testosterone trophy driving gloves handsome</td>
                                        <td>$64.50</td>
                                      </tr>
                                      <tr>
                                        <td>1</td>
                                        <td>Need for Speed IV</td>
                                        <td>247-925-726</td>
                                        <td>Wes Anderson umami biodiesel</td>
                                        <td>$50.00</td>
                                      </tr>
                                      <tr>
                                        <td>1</td>
                                        <td>Monsters DVD</td>
                                        <td>735-845-642</td>
                                        <td>Terry Richardson helvetica tousled street art master</td>
                                        <td>$10.70</td>
                                      </tr>
                                      <tr>
                                        <td>1</td>
                                        <td>Grown Ups Blue Ray</td>
                                        <td>422-568-642</td>
                                        <td>Tousled lomo letterpress</td>
                                        <td>$25.99</td>
                                      </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                  <!-- /.col -->
                                </div>
                                <!-- /.row -->
                  
                                <div class="row">
                                  <!-- accepted payments column -->
                                  <div class="col-6">
                                    <p class="lead">Payment Methods:</p>
                                    <img src="../../dist/img/credit/visa.png" alt="Visa">
                                    <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                                    <img src="../../dist/img/credit/american-express.png" alt="American Express">
                                    <img src="../../dist/img/credit/paypal2.png" alt="Paypal">
                  
                                    <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                      Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                                      plugg
                                      dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                                    </p>
                                  </div>
                                  <!-- /.col -->
                                  <div class="col-6">
                                    <p class="lead">Amount Due 2/22/2014</p>
                  
                                    <div class="table-responsive">
                                      <table class="table">
                                        <tbody><tr>
                                          <th style="width:50%">Subtotal:</th>
                                          <td>$250.30</td>
                                        </tr>
                                        <tr>
                                          <th>Tax (9.3%)</th>
                                          <td>$10.34</td>
                                        </tr>
                                        <tr>
                                          <th>Shipping:</th>
                                          <td>$5.80</td>
                                        </tr>
                                        <tr>
                                          <th>Total:</th>
                                          <td>$265.24</td>
                                        </tr>
                                      </tbody></table>
                                    </div>
                                  </div>
                                  <!-- /.col -->
                                </div>
                                <!-- /.row -->
                  
                                <!-- this row will not appear when printing -->
                                <div class="row no-print">
                                  <div class="col-12">
                                    <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                                    <button type="button" class="btn btn-success float-right"><i class="fa fa-credit-card"></i> Submit
                                      Payment
                                    </button>
                                    <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                      <i class="fa fa-download"></i> Generate PDF
                                    </button>
                                  </div>
                                </div>
                              </div>                
                </div>
            </div>
        </div>  
        

    </div>

<!-- ##########################################Modal################-->

<div class="modal fade" id="disposisiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                @include('Disposisi.disposisi_Kulp')
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
</div>



<div class="modal fade" id="penanggung_jawabModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                @include('Paket.penanggung_jawab')
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
</div>

@endsection