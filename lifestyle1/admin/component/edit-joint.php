<tr>
    <td>CERVICAL</td>
    <td>
        <select name="cetender" id="cetender" class="form-control">
            <option value="">Select</option>
            <option value="Yes" <?php if($rows['cetender'] == 'Yes') { ?> selected="selected"<?php } ?>>Yes</option>
            <option value="No" <?php if($rows['cetender'] == 'No') { ?> selected="selected"<?php } ?>>No</option>
        </select>
    </td>
    <td>
        <select name="ceswell" id="ceswell" class="form-control">
            <option value="">Select</option>
            <option value="Yes" <?php if($rows['ceswell'] == 'Yes') { ?> selected="selected"<?php } ?>>Yes</option>
            <option value="No" <?php if($rows['ceswell'] == 'No') { ?> selected="selected"<?php } ?>>No</option>
        </select>
    </td>
    <td><input type="text" name="cearom" class="form-control" value="<?php echo htmlentities($rows['cearom']) ?>"></td>
    <td><input type="text" name="ceprom" class="form-control" value="<?php echo htmlentities($rows['ceprom']) ?>"></td>
</tr>
<tr>
    <td>SHOULDER RIGHT</td>
    <td>
        <select name="shrttender" id="shrttender" class="form-control">
            <option value="">Select</option>
            <option value="Yes" <?php if($rows['shrttender'] == 'Yes') { ?> selected="selected"<?php } ?>>Yes</option>
            <option value="No" <?php if($rows['shrttender'] == 'No') { ?> selected="selected"<?php } ?>>No</option>
        </select>
    </td>
    <td>
        <select name="shrtswell" id="shrtswell" class="form-control">
            <option value="">Select</option>
            <option value="Yes" <?php if($rows['shrtswell'] == 'Yes') { ?> selected="selected"<?php } ?>>Yes</option>
            <option value="No" <?php if($rows['shrtswell'] == 'No') { ?> selected="selected"<?php } ?>>No</option>
        </select>
    </td>
    <td><input type="text" name="shrtarom" class="form-control" value="<?php echo htmlentities($rows['shrtarom']) ?>"></td>
    <td><input type="text" name="shrtprom" class="form-control" value="<?php echo htmlentities($rows['shrtprom']) ?>"></td>
</tr>
<tr>
    <td>SHOULDER LEFT</td>
    <td>
        <select name="shlttender" class="form-control">
            <option value="">Select</option>
            <option value="Yes" <?php if($rows['shlttender'] == 'Yes') { ?> selected="selected"<?php } ?>>Yes</option>
            <option value="No" <?php if($rows['shlttender'] == 'No') { ?> selected="selected"<?php } ?>>No</option>
        </select>
    </td>
    <td>
        <select name="shltsell" class="form-control">
            <option value="">Select</option>
            <option value="Yes" <?php if($rows['shltsell'] == 'Yes') { ?> selected="selected"<?php } ?>>Yes</option>
            <option value="No" <?php if($rows['shltsell'] == 'No') { ?> selected="selected"<?php } ?>>No</option>
        </select>
    </td>
    <td><input type="text" name="shltarom" class="form-control" value="<?php echo htmlentities($rows['shltarom']) ?>"></td>
    <td><input type="text" name="shltprom" class="form-control" value="<?php echo htmlentities($rows['shltprom']) ?>"></td>
</tr>
<tr>
    <td>ELBOW RIGHT</td>
    <td>
        <select name="elrttender" class="form-control">
            <option value="">Select</option>
            <option value="Yes" <?php if($rows['elrttender'] == 'Yes') { ?> selected="selected"<?php } ?>>Yes</option>
            <option value="No" <?php if($rows['elrttender'] == 'No') { ?> selected="selected"<?php } ?>>No</option>
        </select>
    </td>
    <td>
        <select name="elrtswell" class="form-control">
            <option value="">Select</option>
            <option value="Yes" <?php if($rows['elrtswell'] == 'Yes') { ?> selected="selected"<?php } ?>>Yes</option>
            <option value="No" <?php if($rows['elrtswell'] == 'No') { ?> selected="selected"<?php } ?>>No</option>
        </select>
    </td>
    <td><input type="text" name="elrtarom" class="form-control" value="<?php echo htmlentities($rows['elrtarom']) ?>"></td>
    <td><input type="text" name="elrtprom" class="form-control" value="<?php echo htmlentities($rows['elrtprom']) ?>"></td>
</tr>
<tr>
    <td>ELBOW LEFT</td>
    <td>
        <select name="ellttender" class="form-control">
            <option value="">Select</option>
            <option value="Yes" <?php if($rows['ellttender'] == 'Yes') { ?> selected="selected"<?php } ?>>Yes</option>
            <option value="No" <?php if($rows['ellttender'] == 'No') { ?> selected="selected"<?php } ?>>No</option>
        </select>
    </td>
    <td>
        <select name="elltswell" class="form-control">
            <option value="">Select</option>
            <option value="Yes" <?php if($rows['elltswell'] == 'Yes') { ?> selected="selected"<?php } ?>>Yes</option>
            <option value="No" <?php if($rows['elltswell'] == 'No') { ?> selected="selected"<?php } ?>>No</option>
        </select>
    </td>
    <td><input type="text" name="elltarom" class="form-control" value="<?php echo htmlentities($rows['elltarom']) ?>"></td>
    <td><input type="text" name="elltprom" class="form-control" value="<?php echo htmlentities($rows['elltprom']) ?>"></td>
</tr>
<tr>
    <td>WRIST RIGHT</td>
    <td>
        <select name="wrttender" class="form-control">
            <option value="">Select</option>
            <option value="Yes" <?php if($rows['wrttender'] == 'Yes') { ?> selected="selected"<?php } ?>>Yes</option>
            <option value="No" <?php if($rows['wrttender'] == 'No') { ?> selected="selected"<?php } ?>>No</option>
        </select>
    </td>
    <td>
        <select name="wrtswell" class="form-control">
            <option value="">Select</option>
            <option value="Yes" <?php if($rows['wrtswell'] == 'Yes') { ?> selected="selected"<?php } ?>>Yes</option>
            <option value="No" <?php if($rows['wrtswell'] == 'No') { ?> selected="selected"<?php } ?>>No</option>
        </select>
    </td>
    <td><input type="text" name="wrtarom" class="form-control" value="<?php echo htmlentities($rows['wrtarom']) ?>"></td>
    <td><input type="text" name="wrtprom" class="form-control" value="<?php echo htmlentities($rows['wrtprom']) ?>"></td>
</tr>
<tr>
    <td>WRIST LEFT</td>
    <td>
        <select name="wrlttender" class="form-control">
            <option value="">Select</option>
            <option value="Yes" <?php if($rows['wrlttender'] == 'Yes') { ?> selected="selected"<?php } ?>>Yes</option>
            <option value="No" <?php if($rows['wrlttender'] == 'No') { ?> selected="selected"<?php } ?>>No</option>
        </select>
    </td>
    <td>
        <select name="wrltswell" class="form-control">
            <option value="">Select</option>
            <option value="Yes" <?php if($rows['wrltswell'] == 'Yes') { ?> selected="selected"<?php } ?>>Yes</option>
            <option value="No" <?php if($rows['wrltswell'] == 'No') { ?> selected="selected"<?php } ?>>No</option>
        </select>
    </td>
    <td><input type="text" name="wrltarom" class="form-control" value="<?php echo htmlentities($rows['wrltarom']) ?>"></td>
    <td><input type="text" name="wrltprom" class="form-control" value="<?php echo htmlentities($rows['wrltprom']) ?>"></td>
</tr>
<tr>
    <td>RIGHT HAND</td>
    <td>
        <select name="harttender" class="form-control">
            <option value="">Select</option>
            <option value="Yes" <?php if($rows['harttender'] == 'Yes') { ?> selected="selected"<?php } ?>>Yes</option>
            <option value="No" <?php if($rows['harttender'] == 'No') { ?> selected="selected"<?php } ?>>No</option>
        </select>
    </td>
    <td>
        <select name="hartswell" class="form-control">
            <option value="">Select</option>
            <option value="Yes" <?php if($rows['hartswell'] == 'Yes') { ?> selected="selected"<?php } ?>>Yes</option>
            <option value="No" <?php if($rows['hartswell'] == 'No') { ?> selected="selected"<?php } ?>>No</option>
        </select>
    </td>
    <td><input type="text" name="hartarom" class="form-control" value="<?php echo htmlentities($rows['hartarom']) ?>"></td>
    <td><input type="text" name="hartprom" class="form-control" value="<?php echo htmlentities($rows['hartprom']) ?>"></td>
</tr>
<tr>
    <td>HAND LEFT</td>
    <td>
        <select name="halttender" class="form-control">
            <option value="">Select</option>
            <option value="Yes" <?php if($rows['halttender'] == 'Yes') { ?> selected="selected"<?php } ?>>Yes</option>
            <option value="No" <?php if($rows['halttender'] == 'No') { ?> selected="selected"<?php } ?>>No</option>
        </select>
    </td>
    <td>
        <select name="haltswell" class="form-control">
            <option value="">Select</option>
            <option value="Yes" <?php if($rows['haltswell'] == 'Yes') { ?> selected="selected"<?php } ?>>Yes</option>
            <option value="No" <?php if($rows['haltswell'] == 'No') { ?> selected="selected"<?php } ?>>No</option>
        </select>
    </td>
    <td><input type="text" name="haltarom" class="form-control" value="<?php echo htmlentities($rows['haltarom']) ?>"></td>
    <td><input type="text" name="haltprom" class="form-control" value="<?php echo htmlentities($rows['haltprom']) ?>"></td>
</tr>
<tr>
    <td>HIP</td>
    <td>
        <select name="hiptender" class="form-control">
            <option value="">Select</option>
            <option value="Yes" <?php if($rows['hiptender'] == 'Yes') { ?> selected="selected"<?php } ?>>Yes</option>
            <option value="No" <?php if($rows['hiptender'] == 'No') { ?> selected="selected"<?php } ?>>No</option>
        </select>
    </td>
    <td>
        <select name="hipswell" class="form-control">
            <option value="">Select</option>
            <option value="Yes" <?php if($rows['hipswell'] == 'Yes') { ?> selected="selected"<?php } ?>>Yes</option>
            <option value="No" <?php if($rows['hipswell'] == 'No') { ?> selected="selected"<?php } ?>>No</option>
        </select>
    </td>
    <td><input type="text" name="hiparom" class="form-control" value="<?php echo htmlentities($rows['hiparom']) ?>"></td>
    <td><input type="text" name="hipprom" class="form-control" value="<?php echo htmlentities($rows['hipprom']) ?>"></td>
</tr>
<tr>
    <td>KNEE</td>
    <td>
        <select name="kneetender" class="form-control">
            <option value="">Select</option>
            <option value="Yes" <?php if($rows['kneetender'] == 'Yes') { ?> selected="selected"<?php } ?>>Yes</option>
            <option value="No" <?php if($rows['kneetender'] == 'No') { ?> selected="selected"<?php } ?>>No</option>
        </select>
    </td>
    <td>
        <select name="kneeswell" class="form-control">
            <option value="">Select</option>
            <option value="Yes" <?php if($rows['kneeswell'] == 'Yes') { ?> selected="selected"<?php } ?>>Yes</option>
            <option value="No" <?php if($rows['kneeswell'] == 'No') { ?> selected="selected"<?php } ?>>No</option>
        </select>
    </td>
    <td><input type="text" name="kneearom" class="form-control" value="<?php echo htmlentities($rows['kneearom']) ?>"></td>
    <td><input type="text" name="kneeprom" class="form-control" value="<?php echo htmlentities($rows['kneeprom']) ?>"></td>
</tr>
<tr>
    <td>ANKLE</td>
    <td>
        <select name="ankletender" class="form-control">
            <option value="">Select</option>
            <option value="Yes" <?php if($rows['ankletender'] == 'Yes') { ?> selected="selected"<?php } ?>>Yes</option>
            <option value="No" <?php if($rows['ankletender'] == 'No') { ?> selected="selected"<?php } ?>>No</option>
        </select>
    </td>
    <td>
        <select name="ankleswell" class="form-control">
            <option value="">Select</option>
            <option value="Yes" <?php if($rows['ankleswell'] == 'Yes') { ?> selected="selected"<?php } ?>>Yes</option>
            <option value="No" <?php if($rows['ankleswell'] == 'No') { ?> selected="selected"<?php } ?>>No</option>
        </select>
    </td>
    <td><input type="text" name="anklearom" class="form-control" value="<?php echo htmlentities($rows['anklearom']) ?>"></td>
    <td><input type="text" name="ankleprom" class="form-control" value="<?php echo htmlentities($rows['ankleprom']) ?>"></td>
</tr>