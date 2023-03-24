@extends('layouts.master')

@section('headtitle','JobTitle')

@section('title','JOB TITLE')

@section('contents') 
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                
                <div class="header">
                    @if ($message=Session::get('success'))
                        <div class="alert alert-success">
                            <h4 class="title">   {{ $message }}</h4></div>  
                    @elseif ($message=Session::get('info'))
                        <div class="alert alert-info">
                            <h4 class="title">   {{ $message }}</h4></div>
                    @elseif ($message=Session::get('danger'))
                        <div class="alert alert-danger">
                            <h4 class="title">   {{ $message }}</h4></div>

                    @endif
                </div>
    
                <div class="col-lg-5 col-md-5">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Create Job Title</h4>
                        </div>
                    

                    <div class="content">
                            <form action="/jobTitle/save" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" class="form-control border-input" name="title">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea rows="5" class="form-control border-input" name="description"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-info btn-fill btn-wd">Save title</button>
                                </div>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>


               <div class="col-lg-7 col-md-8">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Job Title List</h4>
                        </div>
                        
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped">
                                <thead>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>options</th>
                                    
                                </thead> 
                                <tbody>
                                    @foreach ($job_titles as $key=> $job_title)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td> {{ $job_title->job_title_name }} </td>
                                            <td> {{ $job_title->description }} </td>
                                            <td>
                                             <a href="jobTitle/edit/{{Crypt::encrypt($job_title->id)}}" style="color:blue"><i class="fa fa-pencil"></i></a> |
                                             <a href="#!" onclick="document.getElementById('delete-{{$job_title->id}}').submit()"
                                                style="color:red"><i class="fa fa-trash"></i></a> 
                                                <form action="/jobTitle/delete/{{Crypt::encrypt($job_title->id)}}"
                                                    method="post"
                                                    onsubmit="return confirm('are you sure?')"
                                                    id="delete-{{$job_title->id}}"
                                                    >
                                                    @csrf
                                                    @method('DELETE')
                                              </form>
                                              
                                            </td>
                                        </tr>
                                    @endforeach
                                  
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
@endsection
