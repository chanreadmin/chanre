<!--<table class="text-center">
    <thead>
        <tr>
            <th>Muscle Testing</th>
            <th>Power</th>
            <th>Tone</th>
            <th>Coordination</th>
        </tr>
    </thead>
    <tbody>
        Shoulder Flexor-->
        <tr>
            <td>Shoulder Flexors</td>
            <td>
                <select name="sfpower" class="form-control" id="shoulderflex">
                    <option value="">Select power</option>
                    <option value="0" <?php if($rows['sfpower'] == '0') { ?> selected="selected"<?php } ?>>0</option>
                    <option value="1" <?php if($rows['sfpower'] == '1') { ?> selected="selected"<?php } ?>>1</option>
                    <option value="2" <?php if($rows['sfpower'] == '2') { ?> selected="selected"<?php } ?>>2</option>
                    <option value="3" <?php if($rows['sfpower'] == '3') { ?> selected="selected"<?php } ?>>3</option>
                    <option value="4" <?php if($rows['sfpower'] == '4') { ?> selected="selected"<?php } ?>>4</option>
                    <option value="5" <?php if($rows['sfpower'] == '5') { ?> selected="selected"<?php } ?>>5</option>
                </select>
            </td>
            <td>
                <select class="form-control" name="sftone">
                    <option value="">Select Tone</option>
                    <option value="Normal" <?php if($rows['sftone'] == 'Normal') { ?> selected="selected"<?php } ?>>Normal</option>
                    <option value="Spasticity" <?php if($rows['sftone'] == 'Spasticity') { ?> selected="selected"<?php } ?>>Spasticity</option>
                    <option value="Flaccidity" <?php if($rows['sftone'] == 'Flaccidity') { ?> selected="selected"<?php } ?>>Flaccidity</option>
                </select>
            </td>
            <td>
                <select class="form-control" name="sfcord">
                    <option value="">Select Coordination</option>
                    <option value="Normal" <?php if($rows['sfcord'] == 'Normal') { ?> selected="selected"<?php } ?>>Normal</option>
                    <option value="Abnormal" <?php if($rows['sfcord'] == 'Abnormal') { ?> selected="selected"<?php } ?>>Abnormal</option>
                </select>
            </td>
        </tr>
        <!-- Shoulder extensor -->
        <tr>
            <td>Shoulder Extensor</td>
            <td>
                <select name="sepower" class="form-control" id="shoulderflex">
                    <option value="">Select power</option>
                    <option value="0" <?php if($rows['sepower'] == '0') { ?> selected="selected"<?php } ?>>0</option>
                    <option value="1" <?php if($rows['sepower'] == '1') { ?> selected="selected"<?php } ?>>1</option>
                    <option value="2" <?php if($rows['sepower'] == '2') { ?> selected="selected"<?php } ?>>2</option>
                    <option value="3" <?php if($rows['sepower'] == '3') { ?> selected="selected"<?php } ?>>3</option>
                    <option value="4" <?php if($rows['sepower'] == '4') { ?> selected="selected"<?php } ?>>4</option>
                    <option value="5" <?php if($rows['sepower'] == '5') { ?> selected="selected"<?php } ?>>5</option>
                </select>
            </td>
            <td>
                <select class="form-control" name="setone">
                    <option value="">Select Tone</option>
                    <option value="Normal" <?php if($rows['setone'] == 'Normal') { ?> selected="selected"<?php } ?>>Normal</option>
                    <option value="Spasticity" <?php if($rows['setone'] == 'Spasticity') { ?> selected="selected"<?php } ?>>Spasticity</option>
                    <option value="Flaccidity" <?php if($rows['setone'] == 'Flaccidity') { ?> selected="selected"<?php } ?>>Flaccidity</option>
                </select>

            </td>
            <td>
                <select class="form-control" name="secord">
                    <option value="">Select Coordination</option>
                    <option value="Normal" <?php if($rows['secord'] == 'Normal') { ?> selected="selected"<?php } ?>>Normal</option>
                    <option value="Abnormal" <?php if($rows['secord'] == 'Abnormal') { ?> selected="selected"<?php } ?>>Abnormal</option>
                </select>
            </td>
        </tr>
        <!-- Shoulder adductors -->
        <tr>
            <td>Shoulder adductors</td>
            <td>
                <select name="saddpower" class="form-control" id="shoulderflex">
                    <option value="">Select power</option>
                    <option value="0" <?php if($rows['saddpower'] == '0') { ?> selected="selected"<?php } ?>>0</option>
                    <option value="1" <?php if($rows['saddpower'] == '1') { ?> selected="selected"<?php } ?>>1</option>
                    <option value="2" <?php if($rows['saddpower'] == '2') { ?> selected="selected"<?php } ?>>2</option>
                    <option value="3" <?php if($rows['saddpower'] == '3') { ?> selected="selected"<?php } ?>>3</option>
                    <option value="4" <?php if($rows['saddpower'] == '4') { ?> selected="selected"<?php } ?>>4</option>
                    <option value="5" <?php if($rows['saddpower'] == '5') { ?> selected="selected"<?php } ?>>5</option>
                </select>
            </td>
            <td>
                <select class="form-control" name="saddtone">
                    <option value="">Select Tone</option>
                    <option value="Normal" <?php if($rows['saddtone'] == 'Normal') { ?> selected="selected"<?php } ?>>Normal</option>
                    <option value="Spasticity" <?php if($rows['saddtone'] == 'Spasticity') { ?> selected="selected"<?php } ?>>Spasticity</option>
                    <option value="Flaccidity" <?php if($rows['saddtone'] == 'Flaccidity') { ?> selected="selected"<?php } ?>>Flaccidity</option>
                </select>

            </td>
            <td>
                <select class="form-control" name="saddcord">
                    <option value="">Select Coordination</option>
                    <option value="Normal" <?php if($rows['saddcord'] == 'Normal') { ?> selected="selected"<?php } ?>>Normal</option>
                    <option value="Abnormal" <?php if($rows['saddcord'] == 'Abnormal') { ?> selected="selected"<?php } ?>>Abnormal</option>

                </select>
            </td>
        </tr>
        <!-- Shoulder abductors -->
        <tr>
            <td>Shoulder Abductors</td>
            <td>
                <select name="sabdpower" class="form-control" id="shoulderflex">
                    <option value="">Select power</option>
                    <option value="0" <?php if($rows['sabdpower'] == '0') { ?> selected="selected"<?php } ?>>0</option>
                    <option value="1" <?php if($rows['sabdpower'] == '1') { ?> selected="selected"<?php } ?>>1</option>
                    <option value="2" <?php if($rows['sabdpower'] == '2') { ?> selected="selected"<?php } ?>>2</option>
                    <option value="3" <?php if($rows['sabdpower'] == '3') { ?> selected="selected"<?php } ?>>3</option>
                    <option value="4" <?php if($rows['sabdpower'] == '4') { ?> selected="selected"<?php } ?>>4</option>
                    <option value="5" <?php if($rows['sabdpower'] == '5') { ?> selected="selected"<?php } ?>>5</option>
                </select>
            </td>
            <td>
                <select class="form-control" name="sabdtone">
                    <option value="">Select Tone</option>
                    <option value="Normal" <?php if($rows['sabdtone'] == 'Normal') { ?> selected="selected"<?php } ?>>Normal</option>
                    <option value="Spasticity" <?php if($rows['sabdtone'] == 'Spasticity') { ?> selected="selected"<?php } ?>>Spasticity</option>
                    <option value="Flaccidity" <?php if($rows['sabdtone'] == 'Flaccidity') { ?> selected="selected"<?php } ?>>Flaccidity</option>
                </select>

            </td>
            <td>
                <select class="form-control" name="sabdcord">
                    <option value="">Select Coordination</option>
                    <option value="Normal" <?php if($rows['sabdcord'] == 'Normal') { ?> selected="selected"<?php } ?>>Normal</option>
                    <option value="Abnormal" <?php if($rows['sabdcord'] == 'Abnormal') { ?> selected="selected"<?php } ?>>Abnormal</option>

                </select>
            </td>
        </tr>
        <!-- Elbow Flexors -->
        <tr>
            <td>Elbow Flexors</td>
            <td>
                <select name="efpower" class="form-control" id="shoulderflex">
                    <option value="">Select power</option>
                    <option value="0" <?php if($rows['efpower'] == '0') { ?> selected="selected"<?php } ?>>0</option>
                    <option value="1" <?php if($rows['efpower'] == '1') { ?> selected="selected"<?php } ?>>1</option>
                    <option value="2" <?php if($rows['efpower'] == '2') { ?> selected="selected"<?php } ?>>2</option>
                    <option value="3" <?php if($rows['efpower'] == '3') { ?> selected="selected"<?php } ?>>3</option>
                    <option value="4" <?php if($rows['efpower'] == '4') { ?> selected="selected"<?php } ?>>4</option>
                    <option value="5" <?php if($rows['efpower'] == '5') { ?> selected="selected"<?php } ?>>5</option>
                </select>
            </td>
            <td>
                <select class="form-control" name="eftone">
                    <option value="">Select Tone</option>
                    <option value="Normal" <?php if($rows['eftone'] == 'Normal') { ?> selected="selected"<?php } ?>>Normal</option>
                    <option value="Spasticity" <?php if($rows['eftone'] == 'Spasticity') { ?> selected="selected"<?php } ?>>Spasticity</option>
                    <option value="Flaccidity" <?php if($rows['eftone'] == 'Flaccidity') { ?> selected="selected"<?php } ?>>Flaccidity</option>
                </select>

            </td>
            <td>
                <select class="form-control" name="efcord">
                    <option value="">Select Coordination</option>
                    <option value="Normal" <?php if($rows['efcord'] == 'Normal') { ?> selected="selected"<?php } ?>>Normal</option>
                    <option value="Abnormal" <?php if($rows['efcord'] == 'Abnormal') { ?> selected="selected"<?php } ?>>Abnormal</option>

                </select>
            </td>
        </tr>
        <!-- Elbow Extensors -->
        <tr>
            <td>Elbow Extensors</td>
            <td>
                <select name="eepower" class="form-control" id="shoulderflex">
                    <option value="">Select power</option>
                    <option value="0" <?php if($rows['eepower'] == '0') { ?> selected="selected"<?php } ?>>0</option>
                    <option value="1" <?php if($rows['eepower'] == '1') { ?> selected="selected"<?php } ?>>1</option>
                    <option value="2" <?php if($rows['eepower'] == '2') { ?> selected="selected"<?php } ?>>2</option>
                    <option value="3" <?php if($rows['eepower'] == '3') { ?> selected="selected"<?php } ?>>3</option>
                    <option value="4" <?php if($rows['eepower'] == '4') { ?> selected="selected"<?php } ?>>4</option>
                    <option value="5" <?php if($rows['eepower'] == '5') { ?> selected="selected"<?php } ?>>5</option>
                </select>
            </td>
            <td>
                <select class="form-control" name="eetone">
                    <option value="">Select Tone</option>
                    <option value="Normal" <?php if($rows['eetone'] == 'Normal') { ?> selected="selected"<?php } ?>>Normal</option>
                    <option value="Spasticity" <?php if($rows['eetone'] == 'Spasticity') { ?> selected="selected"<?php } ?>>Spasticity</option>
                    <option value="Flaccidity" <?php if($rows['eetone'] == 'Flaccidity') { ?> selected="selected"<?php } ?>>Flaccidity</option>
                </select>

            </td>
            <td>
                <select class="form-control" name="eecord">
                    <option value="">Select Coordination</option>
                    <option value="Normal" <?php if($rows['eecord'] == 'Normal') { ?> selected="selected"<?php } ?>>Normal</option>
                    <option value="Abnormal" <?php if($rows['eecord'] == 'Abnormal') { ?> selected="selected"<?php } ?>>Abnormal</option>

                </select>
            </td>
        </tr>
        <!-- Wrist Flexors -->
        <tr>
            <td>Wrist Flexors</td>
            <td>
                <select name="wfpower" class="form-control" id="shoulderflex">
                    <option value="">Select power</option>
                    <option value="0" <?php if($rows['wfpower'] == '0') { ?> selected="selected"<?php } ?>>0</option>
                    <option value="1" <?php if($rows['wfpower'] == '1') { ?> selected="selected"<?php } ?>>1</option>
                    <option value="2" <?php if($rows['wfpower'] == '2') { ?> selected="selected"<?php } ?>>2</option>
                    <option value="3" <?php if($rows['wfpower'] == '3') { ?> selected="selected"<?php } ?>>3</option>
                    <option value="4" <?php if($rows['wfpower'] == '4') { ?> selected="selected"<?php } ?>>4</option>
                    <option value="5" <?php if($rows['wfpower'] == '5') { ?> selected="selected"<?php } ?>>5</option>
                </select>
            </td>
            <td>
                <select class="form-control" name="wftone">
                    <option value="">Select Tone</option>
                    <option value="Normal" <?php if($rows['wftone'] == 'Normal') { ?> selected="selected"<?php } ?>>Normal</option>
                    <option value="Spasticity" <?php if($rows['wftone'] == 'Spasticity') { ?> selected="selected"<?php } ?>>Spasticity</option>
                    <option value="Flaccidity" <?php if($rows['wftone'] == 'Flaccidity') { ?> selected="selected"<?php } ?>>Flaccidity</option>
                </select>

            </td>
            <td>
                <select class="form-control" name="wfcord">
                    <option value="">Select Coordination</option>
                    <option value="Normal" <?php if($rows['wfcord'] == 'Normal') { ?> selected="selected"<?php } ?>>Normal</option>
                    <option value="Abnormal" <?php if($rows['wfcord'] == 'Abnormal') { ?> selected="selected"<?php } ?>>Abnormal</option>

                </select>
            </td>
        </tr>
        <!-- Wrist Extension -->
        <tr>
            <td>Wrist Extension</td>
            <td>
                <select name="wepower" class="form-control" id="shoulderflex">
                    <option value="">Select power</option>
                    <option value="0" <?php if($rows['wepower'] == '0') { ?> selected="selected"<?php } ?>>0</option>
                    <option value="1" <?php if($rows['wepower'] == '1') { ?> selected="selected"<?php } ?>>1</option>
                    <option value="2" <?php if($rows['wepower'] == '2') { ?> selected="selected"<?php } ?>>2</option>
                    <option value="3" <?php if($rows['wepower'] == '3') { ?> selected="selected"<?php } ?>>3</option>
                    <option value="4" <?php if($rows['wepower'] == '4') { ?> selected="selected"<?php } ?>>4</option>
                    <option value="5" <?php if($rows['wepower'] == '5') { ?> selected="selected"<?php } ?>>5</option>
                </select>
            </td>
            <td>
                <select class="form-control" name="wetone">
                    <option value="">Select Tone</option>
                    <option value="Normal" <?php if($rows['wetone'] == 'Normal') { ?> selected="selected"<?php } ?>>Normal</option>
                    <option value="Spasticity" <?php if($rows['wetone'] == 'Spasticity') { ?> selected="selected"<?php } ?>>Spasticity</option>
                    <option value="Flaccidity" <?php if($rows['wetone'] == 'Flaccidity') { ?> selected="selected"<?php } ?>>Flaccidity</option>
                </select>

            </td>
            <td>
                <select class="form-control" name="wecord">
                    <option value="">Select Coordination</option>
                    <option value="Normal" <?php if($rows['wecord'] == 'Normal') { ?> selected="selected"<?php } ?>>Normal</option>
                    <option value="Abnormal" <?php if($rows['wecord'] == 'Abnormal') { ?> selected="selected"<?php } ?>>Abnormal</option>

                </select>
            </td>
        </tr>
        <!-- Hip Extensions -->
        <tr>
            <td>Hip Extensions</td>
            <td>
                <select name="hepower" class="form-control" id="shoulderflex">
                    <option value="">Select power</option>
                    <option value="0" <?php if($rows['hepower'] == '0') { ?> selected="selected"<?php } ?>>0</option>
                    <option value="1" <?php if($rows['hepower'] == '1') { ?> selected="selected"<?php } ?>>1</option>
                    <option value="2" <?php if($rows['hepower'] == '2') { ?> selected="selected"<?php } ?>>2</option>
                    <option value="3" <?php if($rows['hepower'] == '3') { ?> selected="selected"<?php } ?>>3</option>
                    <option value="4" <?php if($rows['hepower'] == '4') { ?> selected="selected"<?php } ?>>4</option>
                    <option value="5" <?php if($rows['hepower'] == '5') { ?> selected="selected"<?php } ?>>5</option>
                </select>
            </td>
            <td>
                <select class="form-control" name="hetone">
                    <option value="">Select Tone</option>
                    <option value="Normal" <?php if($rows['hetone'] == 'Normal') { ?> selected="selected"<?php } ?>>Normal</option>
                    <option value="Spasticity" <?php if($rows['hetone'] == 'Spasticity') { ?> selected="selected"<?php } ?>>Spasticity</option>
                    <option value="Flaccidity" <?php if($rows['hetone'] == 'Flaccidity') { ?> selected="selected"<?php } ?>>Flaccidity</option>
                </select>

            </td>
            <td>
                <select class="form-control" name="hecord">
                    <option value="">Select Coordination</option>
                    <option value="Normal" <?php if($rows['hecord'] == 'Normal') { ?> selected="selected"<?php } ?>>Normal</option>
                    <option value="Abnormal" <?php if($rows['hecord'] == 'Abnormal') { ?> selected="selected"<?php } ?>>Abnormal</option>
                </select>
            </td>
        </tr>
        <!-- Hip Flexors -->
        <tr>
            <td>Hip Flexors</td>
            <td>
                <select name="hipflexorpower" class="form-control" id="shoulderflex">
                    <option value="">Select power</option>
                    <option value="0" <?php if($rows['hipflexorpower'] == '0') { ?> selected="selected"<?php } ?>>0</option>
                    <option value="1" <?php if($rows['hipflexorpower'] == '1') { ?> selected="selected"<?php } ?>>1</option>
                    <option value="2" <?php if($rows['hipflexorpower'] == '2') { ?> selected="selected"<?php } ?>>2</option>
                    <option value="3" <?php if($rows['hipflexorpower'] == '3') { ?> selected="selected"<?php } ?>>3</option>
                    <option value="4" <?php if($rows['hipflexorpower'] == '4') { ?> selected="selected"<?php } ?>>4</option>
                    <option value="5" <?php if($rows['hipflexorpower'] == '5') { ?> selected="selected"<?php } ?>>5</option>
                </select>
            </td>
            <td>
                <select class="form-control" name="hipflexortone">
                    <option value="">Select Tone</option>
                    <option value="Normal" <?php if($rows['hipflexortone'] == 'Normal') { ?> selected="selected"<?php } ?>>Normal</option>
                    <option value="Spasticity" <?php if($rows['hipflexortone'] == 'Spasticity') { ?> selected="selected"<?php } ?>>Spasticity</option>
                    <option value="Flaccidity" <?php if($rows['hipflexortone'] == 'Flaccidity') { ?> selected="selected"<?php } ?>>Flaccidity</option>
                </select>

            </td>
            <td>
                <select class="form-control" name="hipflexorcord">
                    <option value="">Select Coordination</option>
                    <option value="Normal" <?php if($rows['hipflexorcord'] == 'Normal') { ?> selected="selected"<?php } ?>>Normal</option>
                    <option value="Abnormal" <?php if($rows['hipflexorcord'] == 'Abnormal') { ?> selected="selected"<?php } ?>>Abnormal</option>
                </select>
            </td>
        </tr>
        <!-- Hip Abductors -->
        <tr>
            <td>Hip Abductors</td>
            <td>
                <select name="hipabdpower" class="form-control" id="shoulderflex">
                    <option value="">Select power</option>
                    <option value="0" <?php if($rows['hipabdpower'] == '0') { ?> selected="selected"<?php } ?>>0</option>
                    <option value="1" <?php if($rows['hipabdpower'] == '1') { ?> selected="selected"<?php } ?>>1</option>
                    <option value="2" <?php if($rows['hipabdpower'] == '2') { ?> selected="selected"<?php } ?>>2</option>
                    <option value="3" <?php if($rows['hipabdpower'] == '3') { ?> selected="selected"<?php } ?>>3</option>
                    <option value="4" <?php if($rows['hipabdpower'] == '4') { ?> selected="selected"<?php } ?>>4</option>
                    <option value="5" <?php if($rows['hipabdpower'] == '5') { ?> selected="selected"<?php } ?>>5</option>
                </select>
            </td>
            <td>
                <select class="form-control" name="hipabdtone">
                    <option value="">Select Tone</option>
                    <option value="Normal" <?php if($rows['hipabdtone'] == 'Normal') { ?> selected="selected"<?php } ?>>Normal</option>
                    <option value="Spasticity" <?php if($rows['hipabdtone'] == 'Spasticity') { ?> selected="selected"<?php } ?>>Spasticity</option>
                    <option value="Flaccidity" <?php if($rows['hipabdtone'] == 'Flaccidity') { ?> selected="selected"<?php } ?>>Flaccidity</option>
                </select>

            </td>
            <td>
                <select class="form-control" name="hipabdcord">
                    <option value="">Select Coordination</option>
                    <option value="Normal" <?php if($rows['hipabdcord'] == 'Normal') { ?> selected="selected"<?php } ?>>Normal</option>
                    <option value="Abnormal" <?php if($rows['hipabdcord'] == 'Abnormal') { ?> selected="selected"<?php } ?>>Abnormal</option>

                </select>
            </td>
        </tr>
        <!-- Hip Adductors -->
        <tr>
            <td>Hip Adductors</td>
            <td>
                <select name="hipaddpower" class="form-control" id="shoulderflex">
                    <option value="">Select power</option>
                    <option value="0" <?php if($rows['hipaddpower'] == '0') { ?> selected="selected"<?php } ?>>0</option>
                    <option value="1" <?php if($rows['hipaddpower'] == '1') { ?> selected="selected"<?php } ?>>1</option>
                    <option value="2" <?php if($rows['hipaddpower'] == '2') { ?> selected="selected"<?php } ?>>2</option>
                    <option value="3" <?php if($rows['hipaddpower'] == '3') { ?> selected="selected"<?php } ?>>3</option>
                    <option value="4" <?php if($rows['hipaddpower'] == '4') { ?> selected="selected"<?php } ?>>4</option>
                    <option value="5" <?php if($rows['hipaddpower'] == '5') { ?> selected="selected"<?php } ?>>5</option>
                </select>
            </td>
            <td>
                <select class="form-control" name="hipaddtone">
                    <option value="">Select Tone</option>
                    <option value="Normal" <?php if($rows['hipaddtone'] == 'Normal') { ?> selected="selected"<?php } ?>>Normal</option>
                    <option value="Spasticity" <?php if($rows['hipaddtone'] == 'Spasticity') { ?> selected="selected"<?php } ?>>Spasticity</option>
                    <option value="Flaccidity" <?php if($rows['hipaddtone'] == 'Flaccidity') { ?> selected="selected"<?php } ?>>Flaccidity</option>
                </select>

            </td>
            <td>
                <select class="form-control" name="hipaddcord">
                    <option value="">Select Coordination</option>
                    <option value="Normal" <?php if($rows['hipaddcord'] == 'Normal') { ?> selected="selected"<?php } ?>>Normal</option>
                    <option value="Abnormal" <?php if($rows['hipaddcord'] == 'Abnormal') { ?> selected="selected"<?php } ?>>Abnormal</option>
                </select>
            </td>
        </tr>
        <!-- Knee Extensor -->
        <tr>
            <td>Knee Extensor</td>
            <td>
                <select name="kepower" class="form-control" id="shoulderflex">
                    <option value="">Select power</option>
                    <option value="0" <?php if($rows['kepower'] == '0') { ?> selected="selected"<?php } ?>>0</option>
                    <option value="1" <?php if($rows['kepower'] == '1') { ?> selected="selected"<?php } ?>>1</option>
                    <option value="2" <?php if($rows['kepower'] == '2') { ?> selected="selected"<?php } ?>>2</option>
                    <option value="3" <?php if($rows['kepower'] == '3') { ?> selected="selected"<?php } ?>>3</option>
                    <option value="4" <?php if($rows['kepower'] == '4') { ?> selected="selected"<?php } ?>>4</option>
                    <option value="5" <?php if($rows['kepower'] == '5') { ?> selected="selected"<?php } ?>>5</option>
                </select>
            </td>
            <td>
                <select class="form-control" name="ketone">
                    <option value="">Select Tone</option>
                    <option value="Normal" <?php if($rows['ketone'] == 'Normal') { ?> selected="selected"<?php } ?>>Normal</option>
                    <option value="Spasticity" <?php if($rows['ketone'] == 'Spasticity') { ?> selected="selected"<?php } ?>>Spasticity</option>
                    <option value="Flaccidity" <?php if($rows['ketone'] == 'Flaccidity') { ?> selected="selected"<?php } ?>>Flaccidity</option>
                </select>

            </td>
            <td>
                <select class="form-control" name="kecord">
                    <option value="">Select Coordination</option>
                    <option value="Normal" <?php if($rows['kecord'] == 'Normal') { ?> selected="selected"<?php } ?>>Normal</option>
                    <option value="Abnormal" <?php if($rows['kecord'] == 'Abnormal') { ?> selected="selected"<?php } ?>>Abnormal</option>

                </select>
            </td>
        </tr>
        <!-- Knee Flexors -->
        <tr>
            <td>Knee Flexors</td>
            <td>
                <select name="kfpower" class="form-control" id="shoulderflex">
                    <option value="">Select power</option>
                    <option value="0" <?php if($rows['kfpower'] == '0') { ?> selected="selected"<?php } ?>>0</option>
                    <option value="1" <?php if($rows['kfpower'] == '1') { ?> selected="selected"<?php } ?>>1</option>
                    <option value="2" <?php if($rows['kfpower'] == '2') { ?> selected="selected"<?php } ?>>2</option>
                    <option value="3" <?php if($rows['kfpower'] == '3') { ?> selected="selected"<?php } ?>>3</option>
                    <option value="4" <?php if($rows['kfpower'] == '4') { ?> selected="selected"<?php } ?>>4</option>
                    <option value="5" <?php if($rows['kfpower'] == '5') { ?> selected="selected"<?php } ?>>5</option>
                </select>
            </td>
            <td>
                <select class="form-control" name="kftone">
                    <option value="">Select Tone</option>
                    <option value="Normal" <?php if($rows['kftone'] == 'Normal') { ?> selected="selected"<?php } ?>>Normal</option>
                    <option value="Spasticity" <?php if($rows['kftone'] == 'Spasticity') { ?> selected="selected"<?php } ?>>Spasticity</option>
                    <option value="Flaccidity" <?php if($rows['kftone'] == 'Flaccidity') { ?> selected="selected"<?php } ?>>Flaccidity</option>
                </select>

            </td>
            <td>
                <select class="form-control" name="kfcord">
                    <option value="">Select Coordination</option>
                    <option value="Normal" <?php if($rows['kfcord'] == 'Normal') { ?> selected="selected"<?php } ?>>Normal</option>
                    <option value="Abnormal" <?php if($rows['kfcord'] == 'Abnormal') { ?> selected="selected"<?php } ?>>Abnormal</option>

                </select>
            </td>
        </tr>
        <!-- Ankle Dorsiflexors -->
        <tr>
            <td>Ankle Dorsiflexors</td>
            <td>
                <select name="adpower" class="form-control" id="shoulderflex">
                    <option value="">Select power</option>
                    <option value="0" <?php if($rows['adpower'] == '0') { ?> selected="selected"<?php } ?>>0</option>
                    <option value="1" <?php if($rows['adpower'] == '1') { ?> selected="selected"<?php } ?>>1</option>
                    <option value="2" <?php if($rows['adpower'] == '2') { ?> selected="selected"<?php } ?>>2</option>
                    <option value="3" <?php if($rows['adpower'] == '3') { ?> selected="selected"<?php } ?>>3</option>
                    <option value="4" <?php if($rows['adpower'] == '4') { ?> selected="selected"<?php } ?>>4</option>
                    <option value="5" <?php if($rows['adpower'] == '5') { ?> selected="selected"<?php } ?>>5</option>
                </select>
            </td>
            <td>
                <select class="form-control" name="adtone">
                    <option value="">Select Tone</option>
                    <option value="Normal" <?php if($rows['adtone'] == 'Normal') { ?> selected="selected"<?php } ?>>Normal</option>
                    <option value="Spasticity" <?php if($rows['adtone'] == 'Spasticity') { ?> selected="selected"<?php } ?>>Spasticity</option>
                    <option value="Flaccidity" <?php if($rows['adtone'] == 'Flaccidity') { ?> selected="selected"<?php } ?>>Flaccidity</option>
                </select>

            </td>
            <td>
                <select class="form-control" name="adcord">
                    <option value="">Select Coordination</option>
                    <option value="Normal" <?php if($rows['adcord'] == 'Normal') { ?> selected="selected"<?php } ?>>Normal</option>
                    <option value="Abnormal" <?php if($rows['adcord'] == 'Abnormal') { ?> selected="selected"<?php } ?>>Abnormal</option>

                </select>
            </td>
        </tr>
        <!-- Ankle plantar felxor -->
        <tr>
            <td>Ankle plantar felxor</td>
            <td>
                <select name="apfpower" class="form-control" id="shoulderflex">
                    <option value="">Select power</option>
                    <option value="0" <?php if($rows['apfpower'] == '0') { ?> selected="selected"<?php } ?>>0</option>
                    <option value="1" <?php if($rows['apfpower'] == '1') { ?> selected="selected"<?php } ?>>1</option>
                    <option value="2" <?php if($rows['apfpower'] == '2') { ?> selected="selected"<?php } ?>>2</option>
                    <option value="3" <?php if($rows['apfpower'] == '3') { ?> selected="selected"<?php } ?>>3</option>
                    <option value="4" <?php if($rows['apfpower'] == '4') { ?> selected="selected"<?php } ?>>4</option>
                    <option value="5" <?php if($rows['apfpower'] == '5') { ?> selected="selected"<?php } ?>>5</option>
                </select>
            </td>
            <td>
                <select class="form-control" name="apftone">
                    <option value="">Select Tone</option>
                    <option value="Normal" <?php if($rows['apftone'] == 'Normal') { ?> selected="selected"<?php } ?>>Normal</option>
                    <option value="Spasticity" <?php if($rows['apftone'] == 'Spasticity') { ?> selected="selected"<?php } ?>>Spasticity</option>
                    <option value="Flaccidity" <?php if($rows['apftone'] == 'Flaccidity') { ?> selected="selected"<?php } ?>>Flaccidity</option>
                </select>

            </td>
            <td>
                <select class="form-control" name="apfcord">
                    <option value="">Select Coordination</option>
                    <option value="Normal" <?php if($rows['apfcord'] == 'Normal') { ?> selected="selected"<?php } ?>>Normal</option>
                    <option value="Abnormal" <?php if($rows['apfcord'] == 'Abnormal') { ?> selected="selected"<?php } ?>>Abnormal</option>
                </select>
            </td>
        </tr>
    <!--</tbody>
</table>-->