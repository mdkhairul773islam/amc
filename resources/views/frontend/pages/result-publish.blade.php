<!doctype html>
<html lang="en">
    <head>
        <!-- required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="u7pslmWaWuv1pujn3hVOlGSLkCWzRoNUJKIAFh3I">

        <!-- title -->
        <title>Ananda Mohan College</title>
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

        <!-- selectpicker css -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

        <!-- include css -->
        <link rel="stylesheet" href="http://anandamohangovtcollege.edu.bd/frontend/style/result.css">

        <!-- jQuery js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Angular -->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
    </head>

    <body>
        <div class="container" >
            <div class="row">
                <div class="wrapper border_url">
                    <!-- banner -->
                    <div class="hide_banner hide"></div>
                        
                        
                    <div class="col-12">
                        <div class="row header_banner none">
                            <div class="col-2">
                                <figure>
                                    <img class="img-thumbnail" src="http://anandamohangovtcollege.edu.bd/public/uploads/logo/10-1642065591.png" alt="Uploaded banner not found!" />
                                </figure>
                            </div>
                            <div class="col-10 text-center">
                                <h1>Ananda Mohan College</h1>
                                <h4>Mymensingh</h4>
                                <p>Phone : +8801910000000 || Email : anandamohan1908@gmail.com</p>
                            </div>
                        </div>
                    </div>
                    <!-- Header -->
                    <div class="col-12 none">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <h2 class="text-center"><strong> Show Online Result </strong></h2>
                    </div>
                    
                    <div class="col-12 none">
                        <form action="{{asset('home/resultShow')}}" method="POST">
                            <div class="row">
                                <div class="col-3 mb-3">
                                    <select class="form-control selectpicker" name="session" data-live-search="true" required>
                                        <option selected> Select Session </option>
                                        @for ($i = date('Y')-2; $i < date('Y')+2; $i++)
    									<?php $session = "$i-" . ($i + 1); ?>
    									<option value="{{ $session }}">{{ $session }}</option>
    									@endfor
                                    </select>
                                </div>
                                <div class="col-3 mb-3">
                                    <select class="form-control selectpicker" name="class" data-live-search="true" required>
    									<option selected>Select Class</option>
    									<option value="Eleven">Eleven</option>
    									<option value="Twelve">Twelve</option>
    									<option value="Honors">Honors</option>
    									<option value="Masters">Masters</option>
    									<option value="Degree">Degree</option>
    								</select>
                                </div>
                                
                                <div class="col-3 mb-3">
                                    <select class="form-control selectpicker" name="group" data-live-search="true" required>
                                        <option selected> Select Group </option>
                                        <option value="others">Others</option>
                                        <option value="science">Science</option>
                                        <option value="huminities">Huminities</option>
                                        <option value="business_studies">Business Studies</option>
                                    </select>
                                </div>
                                
                                <div class="col-3 mb-3">
                                    <select class="form-control selectpicker" name="section" data-live-search="true" required>
                                            <option selected> Select Section</option>
                                            <option value="None">None</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                        </select>
                                </div>
                                
                                <div class="col-3 mb-3">
                                    <input type="text" class="form-control" name="roll" placeholder="Enter Your Roll" autocomplete="off" required>
                                </div>
                                
                                <div class="col-3 mb-3">
                                    <select class="form-control selectpicker" name="exam" data-live-search="true" required>
                                        <option selected> Select Exam </option>
                                        @foreach($examName as $key => $value)
                                        <option value="{{ $value->exam_id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="col-3">
                                    <div class="btn-group">
                                        <input type="submit" class="btn submit_btn" value="Save">
                                    </div>
                                </div>
                                
                                <div class="hr_style">&nbsp;</div>
                            </div>
                        </form>
                    </div>
                    
                    
                    <div class="col-12">
                        <div>
                            <h3 class="text-center">ACADEMIC TRANSCRIPT</h3>
                            <p class="text-center">Annual Exam 2018-2018</p>
    
                            <table class="table table-bordered table_border_none">
                                <tbody>
                                    <tr>
                                        <td class="padding_none" style="padding-left: 0px !important;">
                                            <table class="table table-bordered mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td width="25%" align="right">Student's ID</td>
                                                        <td width="25%" align="left" colspan="2"></td>
                                                        <td width="25%" align="center" rowspan="5">
                                                            <img style="width:100px; height:100px;" src="http://localhost/gsfmmc/public/students" alt="">
                                                        </td>
                                                    </tr>
                                                
                                                    <tr>
                                                        <td width="25%" align="right">Class Roll</td>
                                                        <td width="25%" align="left" colspan="2">101</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="25%" align="right">Name</td>
                                                        <td width="25%" align="left" colspan="2"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="25%" align="right">Class</td>
                                                        <td width="25%" align="left" colspan="2"><b>Eleven</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="25%" align="right">Group</td>
                                                        <td width="25%" align="left" colspan="2">Huminities</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="25%" align="right">Section</td>
                                                        <td width="25%" align="left">B</td>
                                                        <td width="25%" align="right">Shift</td>
                                                        <td width="25%" align="left">0</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="25%" align="right">Session</td>
                                                        <td width="25%" align="left">2018-2019</td>
                                                        <td width="25%" align="right">Version</td>
                                                        <td width="25%" align="left"><b>Bangla</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="25%" align="right">Batch</td>
                                                        <td width="25%" align="left" colspan="3">0</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        
                                        <td class="padding_none" style="padding-right: 0px !important; ">
                                            <table class="table table-bordered mb-0">
                                                <tbody>
                                                    <tr>		
                                                        <td width="34%" align="center"><b>LG</b></td>				          
                                                        <td width="33%" align="center"><b>Marks</b></td>					          
                                                        <td width="33%" align="center"><b>GP</b></td>				          
                                                    </tr>
                                                    <tr>
                                                        <td align="center">A+</td>
                                                        <td align="center">80-100</td>					          
                                                        <td align="center">5</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center">A</td>
                                                        <td align="center">70-79</td>			          				       
                                                        <td align="center">4</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center">A-</td>
                                                        <td align="center">60-69</td>					          
                                                        <td align="center">3.5</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center">B</td>
                                                        <td align="center">50-59</td>					          
                                                        <td align="center">3</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center">C</td>
                                                        <td align="center">40-49</td>					          
                                                        <td align="center">2</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center">D</td>
                                                        <td align="center">33-39</td>					          
                                                        <td align="center">1</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center">F</td>
                                                        <td align="center">0-32</td>					          
                                                        <td align="center">0</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
    
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th width="45"><p>SL</p></th>
                                        <th><p>Subjects</p></th>
                                        <th width="110"><p>Full Marks</p></th>					
                                        <th width="80"><p>OBJ</p></th>					
                                        <th width="80"><p>WR</p></th>					
                                        <th width="80"><p>PRAC</p></th>
                                        <th width="80"><p>Total Marks</p></th>
                                        <th width="80"><p>Highest Marks</p></th>		
                                        <th width="80"><p>Letter Grade</p></th>	
                                        <th width="80"><p>Grade Point</p></th>					
                                    </tr>				
                                    <tr>
                                        <td>1</td>
                                        <td class="className">BANGLA 1st Paper</td>
                                        <td align="center"><b>100</b></td>														
                                        <td align="center">17.00</td>
                                        <td align="center">60.00</td>
                                        <td align="center">0.00</td>								
                                        <td align="center"><b>77.00</b></td>													
                                        <td align="center">77.00</td>		
                                        <td align="center">A</td>	
                                        <td align="center" rowspan="1"><b>4.00</b></td>										
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td class="className">BANGLA 1st Paper</td>
                                        <td align="center"><b>100</b></td>														
                                        <td align="center">17.00</td>
                                        <td align="center">60.00</td>
                                        <td align="center">0.00</td>								
                                        <td align="center"><b>77.00</b></td>													
                                        <td align="center">77.00</td>		
                                        <td align="center">A</td>	
                                        <td align="center" rowspan="1"><b>4.00</b></td>										
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td class="className">BANGLA 1st Paper</td>
                                        <td align="center"><b>100</b></td>														
                                        <td align="center">17.00</td>
                                        <td align="center">60.00</td>
                                        <td align="center">0.00</td>								
                                        <td align="center"><b>77.00</b></td>													
                                        <td align="center">77.00</td>		
                                        <td align="center">A</td>	
                                        <td align="center" rowspan="1"><b>4.00</b></td>										
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td class="className">BANGLA 1st Paper</td>
                                        <td align="center"><b>100</b></td>														
                                        <td align="center">17.00</td>
                                        <td align="center">60.00</td>
                                        <td align="center">0.00</td>								
                                        <td align="center"><b>77.00</b></td>													
                                        <td align="center">77.00</td>		
                                        <td align="center">A</td>	
                                        <td align="center" rowspan="1"><b>4.00</b></td>										
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td class="className">BANGLA 1st Paper</td>
                                        <td align="center"><b>100</b></td>														
                                        <td align="center">17.00</td>
                                        <td align="center">60.00</td>
                                        <td align="center">0.00</td>								
                                        <td align="center"><b>77.00</b></td>													
                                        <td align="center">77.00</td>		
                                        <td align="center">A</td>	
                                        <td align="center" rowspan="1"><b>4.00</b></td>										
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td class="className">BANGLA 1st Paper</td>
                                        <td align="center"><b>100</b></td>														
                                        <td align="center">17.00</td>
                                        <td align="center">60.00</td>
                                        <td align="center">0.00</td>								
                                        <td align="center"><b>77.00</b></td>													
                                        <td align="center">77.00</td>		
                                        <td align="center">A</td>	
                                        <td align="center" rowspan="1"><b>4.00</b></td>										
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td class="className">BANGLA 1st Paper</td>
                                        <td align="center"><b>100</b></td>														
                                        <td align="center">17.00</td>
                                        <td align="center">60.00</td>
                                        <td align="center">0.00</td>								
                                        <td align="center"><b>77.00</b></td>													
                                        <td align="center">77.00</td>		
                                        <td align="center">A</td>	
                                        <td align="center" rowspan="1"><b>4.00</b></td>										
                                    </tr>
                                    <tr>
                                        <td colspan="6"><b>Total Marks &amp; Total GP</b></td>
                                        <td align="center"><b>77</b></td>
                                        <td colspan="2"></td>				                
                                        <td align="center"><b>4</b></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">	
                                <tbody>
                                    <tr>
                                        <th align="left">GPA</th>
                                        <th class="text-center">4</th>
                                        <th class="text-center" colspan="2">Position in Merit List</th>
                                        <th class="text-center" colspan="2">Attendance</th>
                                    </tr>
                                    
                                    <tr>
                                        <td width="16.66%">Letter Grade</td>
                                        <td width="16.66%" align="center"><b>A</b></td>
                                        <td width="16.66%" align="center" rowspan="2">Class Roll</td>
                                        <td width="16.66%" align="center" rowspan="2">1 out of 0</td>
                                        <td width="16.66%">Working Day</td>
                                        <td width="16.66%">0</td>
                                    </tr>
                                    <tr>
                                        <td width="16.66%">Total Marks</td>
                                        <td width="16.66%" align="center"><b>77</b></td>			
                                        <td width="16.66%">Present</td>
                                        <td width="16.66%">0</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">	
                                <tbody>
                                    <tr>
                                        <td><b>Remarks : </b>Good</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">	
                                <tbody>
                                    <tr>
                                        <td colspan="7">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <th width="21.25%">Class Teacher</th>
                                        <th width="5%"></th>
                                        <th width="21.25%">Parents/Guardian</th>
                                        <th width="5%"></th>
                                        <th width="21.25%">Principal</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="col-12 mb-3">
                        <strong class="text-center d-block" style="width: 100%;">Date of publication of result: 03 April, 2022</strong>
                    </div>
                    
                    <div class="col-12 mb-3 none">
                        <a href="" class="print" onclick="window.print()">Print</a>
                        <a href="" class="print" target="_blank">Download</a>
                    </div>
                    
                    
                    
                    
                    
                    <div class="col-12 none">
                        <div class="row">
                            <footer class="secound_footer">
                                <div class="footer_info">
                                    <p>© Ananda Mohan College.</p>
                                    <p>Developed By: <a class="btn btn-link" href="freelanceitlab.com"> Freelance IT Lab</a></p>
                                </div>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- bootstrap js -->
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
        <!-- selectpicker js -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
		<script>
            // selectpicker
            $('.selectpicker').selectpicker();
        </script>
    </body>
</html>