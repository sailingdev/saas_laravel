<form>
  <div class="m-b-40">
    <h5 class="fs-16 fw-4 text-info m-b-20"><i class="fas fa-caret-right"></i> <?php _e('Configure proxies')?></h5>
      <div class="form-group">
      <label for="status"><?php _e('User can add proxies')?></label>
      <div>
        <label class="i-radio i-radio--tick i-radio--brand m-r-10">
          <input type="radio" name="user_proxy" <?php _e( get_option('user_proxy', 1)  == 1?"checked":"" )?> value="1"> <?php _e('Enable')?>
          <span></span>
        </label>
        <label class="i-radio i-radio--tick i-radio--brand m-r-10">
          <input type="radio" name="user_proxy" <?php _e( get_option('user_proxy', 1)  == 0?"checked":"" )?> value="0"> <?php _e('Disable')?>
          <span></span>
        </label>
      </div>
    </div>
    <div class="form-group">
      <label for="status"><?php _e('User can use the system proxies')?></label>
      <div>
        <label class="i-radio i-radio--tick i-radio--brand m-r-10">
          <input type="radio" name="system_proxy" <?php _e( get_option('system_proxy', 1)  == 1?"checked":"" )?> value="1"> <?php _e('Enable')?>
          <span></span>
        </label>
        <label class="i-radio i-radio--tick i-radio--brand m-r-10">
          <input type="radio" name="system_proxy" <?php _e( get_option('system_proxy', 1)  == 0?"checked":"" )?> value="0"> <?php _e('Disable')?>
          <span></span>
        </label>
      </div>
    </div>
  </div>
  <button type="submit" class="btn btn-info"><?php _e('Submit')?></button>
</form>