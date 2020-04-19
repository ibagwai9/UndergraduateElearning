@extends('layouts.app', [
    'namePage' => 'Ulearn::UG',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'welcome',
    'backgroundImage' => asset('assets') . "/img/banner.jpg",
])

@section('content')
  <div class="content">
    <div class="container">
      <div class="col-md-12 ml-auto mr-auto">
          <div class="header bg-gradient-primary py-10 py-lg-2 pt-lg-12">
              <div class="container">
                  <div class="content">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="card">
                            <div class="card-header">
                              <h4 class="card-title"> Simple Table</h4>
                            </div>
                            <div class="card-body">
                              <div class="table-responsive">
                                <table class="table">
                                  <thead class=" text-primary">
                                    <th>
                                      Name
                                    </th>
                                    <th>
                                      Country
                                    </th>
                                    <th>
                                      City
                                    </th>
                                    <th class="text-right">
                                      Salary
                                    </th>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>
                                        Dakota Rice
                                      </td>
                                      <td>
                                        Niger
                                      </td>
                                      <td>
                                        Oud-Turnhout
                                      </td>
                                      <td class="text-right">
                                        $36,738
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        Minerva Hooper
                                      </td>
                                      <td>
                                        Curaçao
                                      </td>
                                      <td>
                                        Sinaai-Waas
                                      </td>
                                      <td class="text-right">
                                        $23,789
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        Sage Rodriguez
                                      </td>
                                      <td>
                                        Netherlands
                                      </td>
                                      <td>
                                        Baileux
                                      </td>
                                      <td class="text-right">
                                        $56,142
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        Philip Chaney
                                      </td>
                                      <td>
                                        Korea, South
                                      </td>
                                      <td>
                                        Overland Park
                                      </td>
                                      <td class="text-right">
                                        $38,735
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        Doris Greene
                                      </td>
                                      <td>
                                        Malawi
                                      </td>
                                      <td>
                                        Feldkirchen in Kärnten
                                      </td>
                                      <td class="text-right">
                                        $63,542
                                      </td>
                                    </tr>
                                    
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                  
              </div>
          </div>
      </div>
      <div class="col-md-4 ml-auto mr-auto">
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      demo.checkFullPageBackgroundImage();
    });
  </script>
@endpush
