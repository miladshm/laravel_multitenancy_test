<template>
    <div>
        <Uploader
            server="/photo"
            @change="changeMedia"
        />
    </div>
</template>

<script>
import Uploader from 'vue-media-upload'

export default {
    data() {
        return {
            media: []
        }
    },
    methods: {
        changeMedia(media) {
            this.media = media
        }
    },
    components: {
        Uploader
    },
}
</script>
