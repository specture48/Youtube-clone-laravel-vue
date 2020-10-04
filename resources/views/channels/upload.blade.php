@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <channel-uploads :channel="{{$channel}}" inline-template>
                <div class="col-md-8">
                    <div class="card p-3 d-flex justify-content-center align-items-center" v-if="!selected">
                        <svg style="cursor: pointer;" onclick="document.getElementById('video-files').click()"
                             xmlns="http://www.w3.org/2000/svg" width="100px" height="70px" viewBox="0 0 24 24">
                            <path
                                d="M4.652 0h1.44l.988 3.702.916-3.702h1.454l-1.665 5.505v3.757h-1.431v-3.757l-1.702-5.505zm6.594 2.373c-1.119 0-1.861.74-1.861 1.835v3.349c0 1.204.629 1.831 1.861 1.831 1.022 0 1.826-.683 1.826-1.831v-3.349c0-1.069-.797-1.835-1.826-1.835zm.531 5.127c0 .372-.19.646-.532.646-.351 0-.554-.287-.554-.646v-3.179c0-.374.172-.651.529-.651.39 0 .557.269.557.651v3.179zm4.729-5.07v5.186c-.155.194-.5.512-.747.512-.271 0-.338-.186-.338-.46v-5.238h-1.27v5.71c0 .675.206 1.22.887 1.22.384 0 .918-.2 1.468-.853v.754h1.27v-6.831h-1.27zm2.203 13.858c-.448 0-.541.315-.541.763v.659h1.069v-.66c.001-.44-.092-.762-.528-.762zm-4.703.04c-.084.043-.167.109-.25.198v4.055c.099.106.194.182.287.229.197.1.485.107.619-.067.07-.092.105-.241.105-.449v-3.359c0-.22-.043-.386-.129-.5-.147-.193-.42-.214-.632-.107zm4.827-5.195c-2.604-.177-11.066-.177-13.666 0-2.814.192-3.146 1.892-3.167 6.367.021 4.467.35 6.175 3.167 6.367 2.6.177 11.062.177 13.666 0 2.814-.192 3.146-1.893 3.167-6.367-.021-4.467-.35-6.175-3.167-6.367zm-12.324 10.686h-1.363v-7.54h-1.41v-1.28h4.182v1.28h-1.41v7.54zm4.846 0h-1.21v-.718c-.223.265-.455.467-.696.605-.652.374-1.547.365-1.547-.955v-5.438h1.209v4.988c0 .262.063.438.322.438.236 0 .564-.303.711-.487v-4.939h1.21v6.506zm4.657-1.348c0 .805-.301 1.431-1.106 1.431-.443 0-.812-.162-1.149-.583v.5h-1.221v-8.82h1.221v2.84c.273-.333.644-.608 1.076-.608.886 0 1.18.749 1.18 1.631v3.609zm4.471-1.752h-2.314v1.228c0 .488.042.91.528.91.511 0 .541-.344.541-.91v-.452h1.245v.489c0 1.253-.538 2.013-1.813 2.013-1.155 0-1.746-.842-1.746-2.013v-2.921c0-1.129.746-1.914 1.837-1.914 1.161 0 1.721.738 1.721 1.914v1.656z"/>
                        </svg>
                        <input multiple type="file" id="video-files" style="display:none" ref="videos" @change="upload">
                        <p class="text-center">Upload Videos</p>
                    </div>
                    <div class="card p3" v-else>
                        <div class="my-4" v-for="video in videos">
                            <div class="progress mb-3">
                                <div class="progress-bar progress-bar-striped progress-bar-animated " role="progressbar"
                                     :style="{ width: `${video.percentage || progress[video.name]}%` }"
                                     aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                    @{{ video.percentage ? video.percentage === 100 ? 'Video Processing completed.' :
                                    'Processing' : 'Uploading' }}
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-4">
                                    <div v-if="!video.thumbnail"
                                         class="d-flex justify-content-center align-items-center"
                                         style="height: 180px; color: white; font-size: 18px; background: #808080;">
                                        Loading thumbnail ...
                                    </div>
                                    <img v-else :src="video.thumbnail" style="width: 100%;" alt="">
                                </div>

                                <div class="col-md-4">
                                    <a v-if="video.percentage && video.percentage === 100" target="_blank"
                                       :href="`/videos/${video.id}`">
                                        @{{ video.title }}
                                    </a>
                                    <h4 v-else class="text-center">
                                        @{{ video.title || video.name }}
                                    </h4>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </channel-uploads>
        </div>
    </div>
@endsection
