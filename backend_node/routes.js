exports.index = function(req,res){
    message = '';
    if(req.method == "POST"){
        var post = req.body;
        var name = post.username;
        var pass = post.password;
        var fname = post.firstname;
        var lname = post.lastname;
        var mob =post.mobileno;
      


        if (!req.files)
                return res.status(400).send('No files were uploaded.');

            var file = req.files.uploaded_images;
            var img_name = file.name;
            
                if (file.mimetype == "images/jpeg" || file.mimetype =="images/png" || file.mimetype == "images/gif" ){
                    file.mv('public/images/upload_images/'+file.name, function(err){
                        if (err)

                            return res.status(500).send(err);
                                var sql = "INSERT INTO `registration_form`( `firstname`, `lastname`, `mobileno`, `username`, `password`, `image`) VALUES ('"+ fname +"','"+ lname +"', '"+ mob +"','" + name +"', '"+ pass +"', '"+ img_name +"')";

                                    var query = db.query(sql, function(err,result){
                                        res.redirect('profile/'+result.insertId);
                                    });

                    });
                }else {
                        message = "This format is not allowed, please upload file with '.png','.gif','.jpg'";
                        res.render('index.ejs',{message: message});
                    }
                }else{
                    res.render('index');
                }        

                };


    exports.profile = function(req,res){
        var message ='';
        var id = req.params.id;
        var sql = "SELECT * FROM `registration_form` WHERE `id`= '"+ id +"'";
        db.query(sql, function(err, result){
            if(result.length <= 0)
            message = "Profile not found!";

            res.render('profile.ejs',{data:result, message: message});
        });
    };