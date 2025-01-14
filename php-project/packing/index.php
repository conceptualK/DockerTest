<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PACKING Login</title>

    <link rel="stylesheet" href="css/grid.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script src="http://code.jquery.com/jquery-latest.min.js"></script>

</head>

<body
    style="background-color: #D7FBFA; background-image: url(image/city.png); background-repeat: no-repeat;  background-position-x: 100%; background-position-y: 120%; background-size: 100%; ">
    <!-- Modal desigh -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registator Information</h5>

                    <button type="button" style="margin-left: auto; display: block;" class="btn btn-danger close"
                        data-dismiss="modal" aria-label="Close" onclick="closeDialog()">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">

                    <div id="liveAlertPlaceholder"></div>

                    <div class="row">
                        <div class="col-6">
                            <label for="txtName" id="nm" class="form-label">Fullname</label>
                            <input type="text" class="form-control" onkeypress="validateInput()" id="txtName">

                        </div>
                        <div class="col-6">
                            <label for="txtEmp" class="form-label">Employee ID</label>
                            <input type="text" class="form-control" id="txtEmp">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <label for="selDept" class="form-label">Department</label>
                            <select id="selDept" class="form-select form-select" aria-label="Small select example">
                                <option selected>Select your department</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label for="txtPwd" class="form-label">Password</label>
                            <input type="password" id="txtPwd" class="form-control"
                                aria-describedby="passwordHelpBlock">
                        </div>
                        <div class="col-6">
                            <label for="txtRePwd" class="form-label">Re-Password</label>
                            <input type="password" id="txtRePwd" class="form-control"
                                aria-describedby="passwordHelpBlock">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div id="passwordHelpBlock" class="form-text">
                                &emsp;Your password must be 8-20 characters long, contain letters and numbers, and must
                                not
                                contain
                                spaces, special characters, or emoji.
                            </div>
                        </div>
                    </div>

                    <div class="mt-5 row">
                        <h5>Please answer the question...</h5>
                        <div id="question_t">
                            <span id="lb_q1">question</span>
                        </div>
                    </div>
                    <div class="mt-2 row">

                        <div class="mt-1 col-12">
                            <label for="txtq" class="form-label text-danger"><strong>Your's
                                    answer...</strong></label>
                            <input type="text" class="form-control" id="txtq" aria-describedby="passwordHelpBlock1">

                            <div id="passwordHelpBlock1" class="form-text">
                                The answer to this question will be used if you forget your password.</div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeDialog()">
                        Close
                    </button> -->
                    <button type="button" class="btn btn-success" id="liveAlertBtn" onclick="insert_into()">Save
                        changes</button>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal desigh -->
    <div class="modal fade" id="resetModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Reset Password</h5>

                    <button type="button" style="margin-left: auto; display: block;" class="btn btn-danger close"
                        data-dismiss="modal" aria-label="Close" onclick="closeDialog()">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">

                    <div id="liveAlertPlaceholder1"></div>

                    <div class="row">
                        <div class="col-10">
                            <label for="txtEmp1" class="form-label">Employee ID</label>
                            <input type="text" class="form-control" id="txtEmp1">

                        </div>
                        <div class=" col-2">
                            <button type="button" class="mt-4 btn btn-primary" id="ppap"
                                onclick="query_question()">check</button>
                        </div>
                    </div>


                    <div class="mt-3 row">
                        <div class="col-6">
                            <label for="txtPwd" class="form-label">New-Password</label>
                            <input type="password" id="txtPwd1" class="form-control"
                                aria-describedby="passwordHelpBlock">
                        </div>
                        <div class="col-6">
                            <label for="txtRePwd" class="form-label">Re-Password</label>
                            <input type="password" id="txtRePwd1" class="form-control"
                                aria-describedby="passwordHelpBlock">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div id="passwordHelpBlock" class="form-text">
                                &emsp;Your password must be 8-20 characters long, contain letters and numbers, and must
                                not
                                contain
                                spaces, special characters, or emoji.
                            </div>
                        </div>
                    </div>

                    <div class="mt-5 row">
                        <h5>Please answer the question...</h5>
                        <div id="question_t1">
                            <span id="lb_q1">question</span>
                        </div>
                    </div>
                    <div class="mt-2 row">

                        <div class="mt-1 col-12">
                            <label for="txtq1" class="form-label text-danger"><strong>Your's
                                    answer...</strong></label>
                            <input type="text" class="form-control" id="txtq1" aria-describedby="passwordHelpBlock1">

                            <div id="passwordHelpBlock1" class="form-text">
                                The answer to this question will be used if you forget your password.</div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeDialog()">
                        Close
                    </button> -->
                    <button type="button" class="btn btn-warning" id="liveAlertBtn1"
                        onclick="update_password()">Send</button>
                </div>
            </div>
        </div>
    </div>




    <div class="AlertTEST"></div>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                <p class="text-white-50 mb-5">Please enter your login and password!</p>

                                <div data-mdb-input-init class="form-outline form-white mb-4">
                                    <label class="form-label" for="typeEmailX">Employee ID</label>

                                    <input type="email" id="typeEmailX" class="form-control form-control-lg"
                                        name="user" />
                                </div>

                                <div data-mdb-input-init class="form-outline form-white mb-4">
                                    <label class="form-label" for="typePasswordX">Password</label>
                                    <input id="txtSearch" type="password" id="typePasswordX"
                                        class="form-control form-control-lg" name="pass" />
                                    <a class="" for="typePasswordX" href="#" onclick="resetPassword()"> reset
                                        password?</a>
                                </div>

                                <div data-mdb-input-init class="form-outline form-white mb-4">                                   
                                    <a class="" for="typePasswordX" href="http://10.19.5.106/packing/patch_luancher.zip" >                                
                                        <button type="button" class="mx-1 btn btn-info btn-lg" > Download Packing Application</button>
                                   </a>
                                </div>


                                <button type="button" class="mx-1 btn btn-info btn-lg" id="myBtn">Register</button>
                                <button data-mdb-button-init data-mdb-ripple-init
                                    class="btn btn-outline-light btn-lg px-5" type="submit"
                                    onclick="login_btn()">Login</button>
                            </div>
                            <div id="notification"></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <script>

        const alertPlaceholder = document.getElementById('liveAlertPlaceholder')
        const appendAlert = (message, type) => {
            const wrapper = document.createElement('div')
            wrapper.innerHTML = [
                `<div class="alert alert-${type} alert-dismissible" role="alert">`,
                `   <div>${message}</div>`,
                '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
                '</div>'
            ].join('')

            alertPlaceholder.append(wrapper)
        }
        const alertPlaceholder2 = document.getElementById('liveAlertPlaceholder1')
        const appendAlert2 = (message, type) => {
            const wrapper1 = document.createElement('div')
            wrapper1.innerHTML = [
                `<div class="alert alert-${type} alert-dismissible" role="alert">`,
                `   <div>${message}</div>`,
                '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
                '</div>'
            ].join('')

            alertPlaceholder2.append(wrapper1)
        }

        $(document).ready(function () {
            $.ajax({
                url: "http://10.19.5.106:5001/api/uGetDepartment",
                type: "GET",
                success: function (response) {
                    let json_dept = JSON.parse(response);

                    for (var i = 0; i < json_dept["Message"].length; i++) {
                        // console.log(json_dept["Message"][i]["dept_name"]);
                        var x = document.getElementById("selDept");
                        var option = document.createElement("option");
                        option.text = json_dept["Message"][i]["dept_name"];
                        x.add(option);
                    }
                }
            });
        });

        function update_password() {
            var txtEmp = document.getElementById("txtEmp1").value;
            var txtPwd = document.getElementById("txtPwd1").value;
            var txtRePwd = document.getElementById("txtRePwd1").value;    
            var txtq = document.getElementById("txtq1").value;

            var param = {
                'username': txtEmp,
                'password': txtPwd,
                'a1': txtq
            };

          //  console.log(JSON.stringify(param));
            if (txtPwd != txtRePwd) {

                appendAlert2('Password not same', 'danger')
                $(".alert-dismissible").fadeTo(2000, 500).slideUp(500, function () {
                    $(".alert-dismissible").alert('close');
                });

            } 
            else {
                $.ajax({
                    url: "http://10.19.5.106:5001/api/uForget",
                    type: "POST",
                    contentType: "application/json",
                    dataType: 'json',
                    data: JSON.stringify(param),
                    success: function (response) {
                     //   console.log(response)

                        if (response["MsgResult"] == "00000") {
                            appendAlert2(response["ErrorMessage"], 'success')
                            $(".alert-dismissible").fadeTo(2000, 500).slideUp(500, function () {
                                $(".alert-dismissible").alert('close');
                                $("#resetModal").modal('hide');
                            });
                        } else {
                            appendAlert2(response["ErrorMessage"], 'danger')
                            $(".alert-dismissible").fadeTo(2000, 500).slideUp(500, function () {
                                $(".alert-dismissible").alert('close');
                            });
                        }
                    }
                });
            }
        }



        function query_question() {
            var txtEmp = document.getElementById("txtEmp1").value;

            var param = {
                'username': txtEmp,
            };
            $.ajax({
                url: "http://10.19.5.106:5001/api/uCheckQ",
                type: "POST",
                contentType: "application/json",
                dataType: 'json',
                data: JSON.stringify(param),
                success: function (response) {
                    document.getElementById('question_t1').innerHTML = '<span>' + response['ErrorMessage'] + '</span>';
                 //   console.log(response);
                }
            });

        }

        function resetPassword() {
            $("#resetModal").modal('show');
            const funnyQuestion = generateFunnyQuestion();
            document.getElementById('question_t').innerHTML = '<span>' + funnyQuestion + '</span>';
        }

        function insert_into() {
            var txtName = document.getElementById("txtName").value;
            var txtEmp = document.getElementById("txtEmp").value;
            var selDept = document.getElementById("selDept");
            var txtPwd = document.getElementById("txtPwd").value;
            var txtRePwd = document.getElementById("txtRePwd").value;
            var question_t = document.getElementById("question_t").innerText;
            var txtq = document.getElementById("txtq").value;
            // console.log(question_t);
            var param = {
                'username': txtEmp,
                'password': txtPwd,
                'fullname': txtName,
                'department': selDept.options[selDept.selectedIndex].text,
                'q1': question_t,
                'a1': txtq
            };
            // console.log(param)
            if (txtPwd != txtRePwd) {

                appendAlert('Password not same', 'danger')
                $(".alert-dismissible").fadeTo(2000, 500).slideUp(500, function () {
                    $(".alert-dismissible").alert('close');
                });

            } else {
                $.ajax({
                    url: "http://10.19.5.106:5001/api/uRegister",
                    type: "POST",
                    contentType: "application/json",
                    dataType: 'json',
                    data: JSON.stringify(param),
                    success: function (response) {
                       // console.log(response);
                        if (response["MsgResult"] == "00000") {
                            appendAlert(response["ErrorMessage"], 'success')
                            $(".alert-dismissible").fadeTo(2000, 500).slideUp(500, function () {
                                $(".alert-dismissible").alert('close');
                                $("#exampleModal1").modal('hide');
                            });
                        } else {
                            appendAlert(response["ErrorMessage"], 'danger')
                            $(".alert-dismissible").fadeTo(2000, 500).slideUp(500, function () {
                                $(".alert-dismissible").alert('close');
                            });
                        }
                    }
                });
            }
        }

        function validateInput() {
            var regex = /^[a-zA-Z\s]*$/;
            var inputValue = document.getElementById("txtName").value;
            if (regex.test(inputValue)) {
                document.getElementById("notification").innerHTML = "Watching.. Everything is Alphabet now";
                return true;
            } else {
                let textName = document.getElementById("txtName").value;

                document.getElementById("txtName").value = "";//textName.replace(/[^a-zA-Z\s]+/g, '');

                return false;
            }
        }

        // Define a set of funny question templates
        const funnyQuestions = [
            'ชื่อของสัตว์เลี้ยงตัวแรกของคุณคืออะไร?',
            'เมืองเกิดของแม่คุณคือที่ไหน?',
            'ชื่อโรงเรียนประถมที่คุณเรียนคืออะไร?',
            'ชื่อของเพื่อนสนิทที่สุดในสมัยเรียนของคุณคืออะไร?',
            'สถานที่ที่คุณพบรักครั้งแรกคือที่ไหน?',
            'ชื่อของครูที่คุณชอบมากที่สุดในโรงเรียนคืออะไร?',
            'สิ่งที่คุณทำบ่อยที่สุดในวันหยุดสุดสัปดาห์คืออะไร?',
            'ชื่อของภาพยนตร์ที่คุณชอบมากที่สุดคืออะไร?',
            'อาหารที่คุณโปรดปรานที่สุดคืออะไร?',
            'ชื่อของคู่มือหรือหนังสือเล่มแรกที่คุณอ่านเมื่อโตขึ้นคืออะไร?',
            'ชื่อของร้านกาแฟหรือร้านอาหารที่คุณไปบ่อยที่สุดคืออะไร?',
            'วันเกิดของคุณคือวันที่เท่าไหร่?',
            'คุณใช้ชื่อเล่นอะไรในวัยเด็ก?',
            'ชื่อของถนนที่คุณเติบโตขึ้นมาคืออะไร?',
            'ชื่อของเมืองที่คุณไปเที่ยวครั้งแรกกับครอบครัวคือที่ไหน?',
            'อาชีพที่คุณฝันอยากทำตอนเด็กคืออะไร?',
            'ชื่อของคนที่คุณเคยชื่นชมมากที่สุดในชีวิตคืออะไร?',
            'ชื่อของทีมกีฬาโปรดของคุณคืออะไร?',
            'ชื่อของการ์ตูนหรือซีรีส์ที่คุณชอบมากที่สุดในวัยเด็กคืออะไร?',
            'ชื่อของเพลงที่คุณฟังบ่อยที่สุดในวัยรุ่นคืออะไร?'
        ];

        // Function to generate a funny question based on the answer
        function generateFunnyQuestion(answer) {
            const randomIndex = Math.floor(Math.random() * funnyQuestions.length);
            return funnyQuestions[randomIndex];
        }



        $('.modal').css('margin-top', (Math.floor((window.innerHeight - $('.modal')[0].offsetHeight) / 10) + 'px'));
        function closeDialog() {
            $("#exampleModal").modal('hide');
            $("#resetModal").modal('hide');

        }
        $(document).ready(function () {
            $("#myBtn").click(function () {
                $("#exampleModal").modal('show');
                const funnyQuestion = generateFunnyQuestion();
                document.getElementById('question_t').innerHTML = '<span>' + funnyQuestion + '</span>';
            });
        });

        $().click({});
        document.querySelector('#txtSearch').addEventListener('keypress', function (e) {
            if (e.key === 'Enter') {
                login_btn()
            }
        });


        function login_btn() {
            var user = $('input[name=user]').val();
            var pass = $('input[name=pass]').val();
            if (user != "" && pass != "") {
                var param = {
                    'username': user,
                    'password': pass,
                };

                $.ajax({
                    url: "http://10.19.5.106:5001/api/uLogin",
                    type: "POST",
                    contentType: "application/json",
                    dataType: 'json',
                    data: JSON.stringify(param),

                    success: function (response) {
                        if (response["MsgResult"].trim() === "00000") {
                            localStorage.setItem('username', user);
                            window.location.href = "Webpage/productionOrder/formProductionOrder.php";
                        } else {
                            alert(response["ErrorMessage"])
                        }

                    }
                });

            }

            else if (name == "") {
                $('<div class="alert alert-danger d-flex align-items-center" role="alert" style="position: fixed; z-index: 1; margin-left:65%; margin-top:40%; width:20%;">' +
                    '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">' +
                    '<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>' + '</svg>' +
                    'โปรดใส่ Username! </div>').appendTo('.AlertTEST');

                setTimeout(function () {
                    $('.alert').remove();
                }, 5000);
            }
            else if (pass == "") {
                $('<div class="alert alert-danger d-flex align-items-center" role="alert" style="position: fixed; z-index: 1; margin-left:78%; width:20%;">' +
                    '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">' +
                    '<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>' + '</svg>' +
                    'โปรดใส่ Password!</div>').appendTo('.AlertTEST');

                setTimeout(function () {
                    $('.alert').remove();
                }, 5000);
            }


        }

    </script>


    </script>

</body>

</html>