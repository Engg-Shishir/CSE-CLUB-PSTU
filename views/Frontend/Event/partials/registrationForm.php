<div class="row m-0">
    <div class="col-md-4 m-0">
        <div class="form-group">
            <label for="exampleInputEmail1">Tranjection No</label>
            <input type="text" name="tranjection" class="form-control" placeholder="Payment Tranjection no">
        </div>
    </div>
    <div class="col-md-4 m-0">
        <div class="form-group">
            <label>Profile Picturer</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image">
                    <label class="custom-file-label">Choose file</label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 m-0">
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Your password">
        </div>
    </div>
</div>
<div class="row m-0">
    <div class="col-md-4 m-0">
        <div class="form-group">
            <label for=""><strong>Carnival</strong></label>
            <?= selectForm($form["carnivals"], "", "select2  form-control carnival"); ?>
        </div>
    </div>
    <div class="col-md-4 m-0">
        <div class="form-group">
            <label>Naame</label>
            <input type="text" name="name" class="form-control" placeholder="Your name">
        </div>
    </div>
    <div class="col-md-4 m-0">
        <div class="form-group">
            <label for="exampleInputEmail1">Student Id</label>
            <input type="text" name="student_id" class="form-control" placeholder="Enter SID">
        </div>
    </div>
</div>
<div class="row p-0 m-0">
    <div class="col-md-4 m-0">
        <div class="form-group">
            <label for=""><strong>College</strong></label>
            <?= selectForm($form["colleges"], "college_code", "select2  form-control"); ?>
        </div>
    </div>
    <div class="col-md-4 m-0">
        <div class="form-group">
            <label for=""><strong>Education</strong></label>
            <select name="current_edu" class="select2  form-control">
                <option value="">Current Education Status</option>
                <?php
                $edu = [
                    "undergaraduate" => "Undergaraduation",
                    "L1-s1" => "Level-1 : Semester-1",
                    "L1-s2" => "Level-1 : Semester-2",
                    "L2-s1" => "Level-2 : Semester-1",
                    "L2-s2" => "Level-2 : Semester-2",
                    "L3-s1" => "Level-3 : Semester-1",
                    "L3-s2" => "Level-3 : Semester-2",
                    "L4-s1" => "Level-4 : Semester-1",
                    "L4-s2" => "Level-4: Semester-2",
                    "postgraduate" => "Postgraduate"
                ];

                foreach ($edu as $key => $value) {
                    echo "<option value='" . $key . "'>" . $value . "</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <div class="col-md-4 m-0">
        <div class="form-group">
            <label for=""><strong>Event</strong></label>
            <?= selectForm([], "event_id", "select2  form-control eventSelect"); ?>
        </div>
    </div>
</div>
<div class="row m-0">
    <div class="col-md-12 m-0">
        <div class="form-group">
            <input type="submit" class="form-control submit-btn" value="Registration">
        </div>
    </div>
</div>