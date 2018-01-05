  <section>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Google Books API</h2>
          <!-- <?php
            // foreach($data as $item) {
              // echo $item['volumeInfo']['title'] . '<br>';
            // }
          ?> -->
        </div>
      </div>
    </div>
  </section>

  <section id="services" class="bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Twitter API</h2>
          <table class="table">
            <thead>
              <tr>
                <th>Created</th>
                <th>Text</th>
                <th>Screen Name</th>
              </tr>
            </thead>
            <tbody>
              <?php
                // Loop through all the items in the response from the API
                foreach($data as $item) { ?>
                <tr>
                  <!-- Gets the date and time the tweet was created -->
                  <td class="w-25"><?= $item->created_at ?></td>
                  <!-- Gets the text of the tweet itself -->
                  <td class="w-50"><?= $item->text ?></td>
                  <!-- Gets the screen name the tweet came from -->
                  <td class="w-50"><?= $item->user->screen_name ?></td>
                </tr>
              <?php } ?>        
            </tbody>
          </table>
          
        </div>
      </div>
    </div>
  </section>