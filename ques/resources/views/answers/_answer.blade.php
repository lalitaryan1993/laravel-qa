<answer :answer="{{ $answer }}" inline-template>

    <div class="media post">
        <div class="d-flex flex-column vote-controls">

            {{-- @include('shared._vote',[
                'model' => $answer
                ]) --}}

                <vote :model="{{ $answer }}" name="answer"></vote>
        </div>


        <div class="media-body">
            <form v-if="editing" @submit.prevent="update">
                <div class="form-group">
                  <textarea class="form-control" v-model="body" rows="10" required></textarea>
                </div>
                <button type="submit"  class="btn btn-primary" :disabled="isInvalid">Update</button>
                <button type="button" @click="cancel" class="btn btn-outline-secondary">Cancel</button>
            </form>
            <div v-else>
                <div v-html="bodyHtml"></div>
                {{-- {!! $answer->body_html !!} --}}

                <div class="row">
                    <div class="col-4">
                        <div class="ml-auto">
                            {{-- Using Policies --}}
                                @can('update', $answer)
                                <a @click.prevent="edit" class="btn btn-sm btn-outline-info">Edit</a>
                                @endcan
                                @can('delete', $answer)
                                <button type="submit" class="btn btn-sm btn-danger" @click="destroy">Delete</button>
                            {{-- @endif --}}
                            @endcan

                        </div>

                    </div>
                    <div class="col-4"></div>
                    <div class="col-4">
                        {{-- @include('shared._author', [
                            'model' => $answer,
                            'label' => 'answered'
                        ]) --}}
                        {{-- now using vuejs. --}}
                        <user-info :model="{{ $answer }}" label="Answered"></user-info>
                        </div>

                </div>
            </div>


        </div>
    </div>

</answer>
