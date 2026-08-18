          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Compose New Message</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group">
                  <label>To: Select Multiple</label>
                  <div class="select2-purple">
                    <select class="select2" id="mailto" name="mailto" multiple="multiple"
                      data-placeholder="Select Recipent" data-dropdown-css-class="select2-purple" style="width: 100%;"
                      wire:model.live="mailtox">
                      @foreach ($users as $key => $user)
                        <option value="{{ $key }}">{{ $user }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    @if (!empty($mailtox))
                      To:
                      @foreach ($mailtox as $row)
                        <button type="button" class="btn btn-default"><i wire:click="removeTo('{{ intval($row) }}')"
                            class="fas fa-times"></i>&nbsp;&nbsp;{{ $users[intval($row)] }}</button>
                      @endforeach
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <input class="form-control" wire:model.defer="compose_subject" placeholder="Subject:">
                </div>
                <div wire:ignore class="form-group">
                  <textarea wire:model.defer="message_body" id="compose-textarea" class="form-control" style="height: 300px">
                      <h1><u>Heading Of Message</u></h1>
                      <h4>Subheading</h4>
                      <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain
                        was born and I will give you a complete account of the system, and expound the actual teachings
                        of the great explorer of the truth, the master-builder of human happiness. No one rejects,
                        dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know
                        how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again
                        is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain,
                        but because occasionally circumstances occur in which toil and pain can procure him some great
                        pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise,
                        except to obtain some advantage from it? But who has any right to find fault with a man who
                        chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that
                        produces no resultant pleasure? On the other hand, we denounce with righteous indignation and
                        dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so
                        blinded by desire, that they cannot foresee</p>
                      <ul>
                        <li>List item one</li>
                        <li>List item two</li>
                        <li>List item three</li>
                        <li>List item four</li>
                      </ul>
                      <p>Thank you,</p>
                      <p>John Doe</p>
                    </textarea>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="float-right">
                  <button wire:click="saveDraft()" type="button" class="btn btn-default"><i
                      class="fas fa-pencil-alt"></i> Draft</button>
                  <button wire:click="sendMessage()" type="submit" class="btn btn-primary"><i
                      class="far fa-envelope"></i> Send</button>
                </div>
                <button wire:click="resetMessage()" type="reset" class="btn btn-default"><i class="fas fa-times"></i>
                  Discard</button>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
