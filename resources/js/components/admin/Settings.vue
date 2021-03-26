<template>
<div>
    <span class="display-4">Settings</span>
    <div class="row border-bottom mb-2"></div>
    <div class="card bg-light mb-3 shadow-lg bg-white" style="width: 600px;">
    <div class="card-header text-muted font-weight-bolder">Manage Year Level | Course/Strand Connection</div>
    <div class="card-body overflow-auto">
        <!-- Year Level row -->
        <form action="#">
            <div class="row border-bottom pb-2">
                <div class="col text-center">
                    <input type="text" class="form-control" placeholder="Year level" required/> 
                </div>
                <div class="col text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus pr-2"></i>Add</button>
                </div>
                <div class="col">
                    <div class="dropdown">
                        <button  class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                            aaaaaaaaaaaaaaa
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li class="dropdown-item"><button type="button" class="btn btn-link">select &#62; Advert</button><a href="#html" class="pr-2 pl-5"><i class="fa fa-edit fa-lg"></i>edit</a><a href="delhtml" class="pl-4 text-danger"><i class="fa fa-trash text-danger"></i>delete</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </form>

        <!-- Course or Strand Row -->
        <form action="#">
            <div class="row border-bottom py-2">
                <div class="col text-center">
                    <input type="text" class="form-control" placeholder="Course / Strand   " required/> 
                </div>
                <div class="col text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus pr-2"></i>Add</button>
                </div>
                <div class="col">
                <div class="dropdown">
                    <button  class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                        aaaaaaaaaaaaaaa
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li class="dropdown-item"><button type="button" class="btn btn-link">select &#62; Advert</button><a href="#html" class="pr-2 pl-5"><i class="fa fa-edit fa-lg"></i>edit</a><a href="delhtml" class="pl-4 text-danger"><i class="fa fa-trash text-danger"></i>delete</a></li>
                    </ul>
                </div>
                </div>
            </div>
        </form>
        <form action="#">
            <div class="row mt-4">
                <div class="col">
                    <button class="btn btn-link">view connected data</button>
                </div>
                <div class="col text-right">
                    <div class="pt-2">
                    <span class="badge badge-pill badge-info text-white p-2">Select</span>
                            <i> &#47;</i>
                        <span class="badge badge-pill badge-info text-white p-2">Select</span>
                    </div>
                </div>
                <div class="col text-left">
                    <button class="btn btn-success mt-1"><i class="fa fa-code-fork pr-2"></i>Connect this Data</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
</template>