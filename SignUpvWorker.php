<!DOCTYPE html>
<html>
    <head>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <title>Sign-Up V-Help</title>
        <style>
            .heading{
                font-weight:Bold;
                text-align:center;
                font-size:50px;
                font-color:#748DA6;
            }
           form{
                background-color: #9CB4CC;
                margin-top:6em;
                margin-left:20em;
                margin-right:20em;
                padding:30px;
                box-shadow: 10px 10px 8px 10px #888888;
                border-radius:15px;
            }
            label{
                font-color:white;
            }
        </style>
    </head>
    <body>
        <div class="heading">STAFF</div>
            <form>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="workeremail">
                    <div id="emailHelp" class="form-text">Enter your Email Id.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Name</label>
                    <input type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Worker ID</label>
                    <input type="text" class="form-control" id="exampleInputUsername1" name="workerid">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="workerpass">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <br></br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            
    </body>
</html