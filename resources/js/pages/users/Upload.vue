<template>
    <div class="card card-border border-danger">
        <div class="card-body">
            <router-link :to="{ name: 'User' }">Back</router-link>
            <br>
            <form @submit.prevent="handleSubmit" action="" method="POST">
                <div class="form-group mb-3">
                    <label for="user_name">User Name</label>
                    <input v-model="form.user_name" type="text" class="form-control form-control-sm" id="user_name"
                        placeholder="Your name" readonly>
                    <!-- <div class="error text-danger" v-if="errors.user_name">{{ errors.user_name[0] }}</div> -->
                </div>

                <div class="form-group mb-3">
                    <img :src="previewImage" alt="image" class="img-thumbnail profile" :style="{ width: '150px' }"
                        id="image" name="image">
                </div>

                <div class="form-group mb-3">
                    <label for="image">Image</label>
                    <input type="file" class="form-control form-control-sm" id="image" placeholder="png or jpg"
                        @change="upload" accept="image/x-png,image/gif,image/jpeg">
                    <div class="error text-danger" v-if="errors.image">{{ errors.image[0] }}</div>
                </div>

                <div class="form-group mb-3">
                    <button class="btn btn-sm btn-danger" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    props: ['id'],
    data() {
        return {
            image: null,
            errors: {},
            previewImage: '/images/image.jpg',
            //   previewImage: null,
            form: {
                user_name: '',
                image: '',
            },
        }
    },
    mounted() {
        this.getUser()
    },
    methods: {
        upload(e) {
            //
            let file = e.target.files[0]
            this.previewImage = URL.createObjectURL(file)
            this.image = file
            console.log(e.target.files);
        },
        getUser() {
            axios.get('/api/users/' + this.id).then((response) => {
                console.log(response.data.users);
                this.form = {
                    user_name: response.data.users.name,
                    //   email: response.data.users.email,
                }
                this.userDetail = response.data.users
                if (response.data.users.photo) {
                    this.previewImage = '/images/users/' + response.data.users.photo
                }
                console.log(this.previewImage);
            })
        },
        handleSubmit() {
            let formData = new FormData()
            formData.append('image', this.image)
            console.log(this.image);
            console.log(this.form);
            console.log(this.id);
            axios.post('/api/users/upload/' + this.id, formData).then(res => {
                console.log(res);
                if (res.data.status) {
                    //   alert(res.data.message)
                    this.$noty.success(res.data.message)
                    this.$router.push({
                        name: 'User'
                    })

                }
            }).catch(error => {
                this.$noty.error('Oops, something went wrong!')
                // console.log(error.response.status);
                if (error.response.status == 403) {
                    this.errors = error.response.data.message
                }
            })
        }
    }
}
</script>

<style lang="scss" scoped></style>
