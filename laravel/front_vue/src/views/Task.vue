<template>
    <div>
        <Sidebar>
            <div class="content-wrapper">
                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="row">
                        <!-- <div class="col-md-6 col-xl-4">
                            <div class="card bg-primary text-white mb-3">
                                <div class="card-header">Header</div>
                                <div class="card-body">
                                    <h5 class="card-title text-white">
                                        Primary card title
                                    </h5>
                                    <p class="card-text">
                                        Some quick example text to build on the
                                        card title and make up.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                            <div class="card bg-secondary text-white mb-3">
                                <div class="card-header">Header</div>
                                <div class="card-body">
                                    <h5 class="card-title text-white">
                                        Secondary card title
                                    </h5>
                                    <p class="card-text">
                                        Some quick example text to build on the
                                        card title and make up.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                            <div class="card bg-success text-white mb-3">
                                <div class="card-header">Header</div>
                                <div class="card-body">
                                    <h5 class="card-title text-white">
                                        Success card title
                                    </h5>
                                    <p class="card-text">
                                        Some quick example text to build on the
                                        card title and make up.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                            <div class="card bg-danger text-white mb-3">
                                <div class="card-header">Header</div>
                                <div class="card-body">
                                    <h5 class="card-title text-white">
                                        Danger card title
                                    </h5>
                                    <p class="card-text">
                                        Some quick example text to build on the
                                        card title and make up.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                            <div class="card bg-warning text-white mb-3">
                                <div class="card-header">Header</div>
                                <div class="card-body">
                                    <h5 class="card-title text-white">
                                        Warning card title
                                    </h5>
                                    <p class="card-text">
                                        Some quick example text to build on the
                                        card title and make up.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                            <div class="card bg-info text-white mb-3">
                                <div class="card-header">Header</div>
                                <div class="card-body">
                                    <h5 class="card-title text-white">
                                        Info card title
                                    </h5>
                                    <p class="card-text">
                                        Some quick example text to build on the
                                        card title and make up.
                                    </p>
                                </div>
                            </div>
                        </div> -->
                        <div class="d-flex align-items-center m-3">
                            <!-- Static status indicators for instructional purposes -->
                            <div class="status-indicator bg-danger me-2"></div>
                            <span class="me-2">Incomplete</span>
                            <div class="status-indicator bg-warning me-2"></div>
                            <span class="me-2">In Progress</span>
                            <div class="status-indicator bg-success me-2"></div>
                            <span>Complete</span>
                        </div>
                        <div
                            class="col-md-6 col-xl-4 mt-2"
                            v-for="task in tasks"
                            :key="task.id"
                        >
                            <div
                                :class="{
                                    card: true,
                                    'border-danger':
                                        task.status === 'incomplete',
                                    'border-warning':
                                        task.status === 'inprogress',
                                    'border-success':
                                        task.status === 'complete',
                                }"
                                style="border-width: 2px"
                            >
                                <div class="card-body">
                                    <h5 class="card-title">
                                        {{ task.title }}
                                    </h5>
                                    <p class="card-text">
                                        <span
                                            v-if="task.description.length > 100"
                                        >
                                            {{
                                                showMore
                                                    ? task.description
                                                    : task.description.slice(
                                                          0,
                                                          100
                                                      )
                                            }}
                                            <a
                                                href="#"
                                                @click="toggleDescription"
                                            >
                                                {{
                                                    showMore
                                                        ? "Show Less"
                                                        : "Show More"
                                                }}
                                            </a>
                                        </span>
                                        <span v-else>
                                            {{ task.description }}
                                        </span>
                                    </p>
                                    <div class="float-end">
                                        <button
                                            data-bs-target="#modal"
                                            data-bs-toggle="modal"
                                            class="btn btn-primary m-1 text-white"
                                            @click="getTask(task.id)"
                                        >
                                            <i class="bi bi-pencil-fill"></i>
                                        </button>
                                        <button
                                            @click="DeleteTask(task.id)"
                                            class="btn btn-danger m-1"
                                        >
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-4 mt-2">
                            <a
                                href=""
                                data-bs-toggle="modal"
                                data-bs-target="#exampleModal"
                                style="height: 50px"
                            >
                                <div class="card text-dark mb-3">
                                    <div class="card-body text-center">
                                        <p
                                            class="fs-3 p-2 fw-semibold text-dark"
                                        >
                                            Add a new task
                                        </p>
                                        <img
                                            src="../assets/plus_PNG106.PNG"
                                            alt="pLUS logo"
                                            class="img-fluid"
                                            style="height: 100px"
                                        />
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </Sidebar>
        <!-- Add Task Model -->
        <div
            class="modal fade"
            id="exampleModal"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                            Add Task
                        </h1>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <form @submit.prevent="onSubmit()" method="post">
                        <div class="modal-body">
                            <!-- <div class="form-group">
                          <label for="">Title : </label>
                          <input type="text" placeholder="Task title" class="form-control">
                        </div> -->
                            <div class="mb-3">
                                <label for="email" class="form-label"
                                    >Title
                                </label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="title"
                                    placeholder="task title"
                                    autofocus
                                    v-model="title"
                                />
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label"
                                    >Description
                                </label>

                                <textarea
                                    cols="30"
                                    rows="10"
                                    class="form-control"
                                    placeholder="task description"
                                    v-model="description"
                                >
                                </textarea>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label"
                                    >Status
                                </label>

                                <select
                                    class="form-control"
                                    id=""
                                    v-model="status"
                                >
                                    <option value="incomplete">
                                        incomplete
                                    </option>
                                    <option value="inprogress">
                                        inprogress
                                    </option>
                                    <option value="complete">complete</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button
                                type="button"
                                class="btn btn-secondary"
                                data-bs-dismiss="modal"
                            >
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">
                                Save changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Add Task Model -->

        <!-- Update Task model -->
        <div
            class="modal fade"
            id="modal"
            data-bs-backdrop="static"
            data-bs-keyboard="false"
            tabindex="-1"
            aria-labelledby="staticBackdropLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">
                            Modal title
                        </h1>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <form @submit.prevent="onUpdate()" method="post">
                        <div class="modal-body">
                            <input
                                type="hidden"
                                id="id"
                                class="form-control p-2 m-2"
                                required
                                :value="updateTask.id"
                            />
                            <div class="mb-3">
                                <label for="email" class="form-label"
                                    >Title
                                </label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="title"
                                    placeholder="task title"
                                    autofocus
                                    v-model="updateTask.title"
                                />
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label"
                                    >Description
                                </label>

                                <textarea
                                    cols="30"
                                    rows="10"
                                    id="description"
                                    class="form-control"
                                    placeholder="task description"
                                    v-model="updateTask.description"
                                >
                                </textarea>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label"
                                    >Status
                                </label>

                                <select
                                    class="form-control"
                                    id="status"
                                    v-model="updateTask.status"
                                >
                                    <option value="incomplete">
                                        incomplete
                                    </option>
                                    <option value="inprogress">
                                        inprogress
                                    </option>
                                    <option value="complete">complete</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button
                                type="button"
                                class="btn btn-secondary"
                                data-bs-dismiss="modal"
                            >
                                Close
                            </button>
                            <button
                                type="submit"
                                class="btn btn-primary update-btn"
                            >
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Update Task Model -->
    </div>
</template>

<script setup>
import { onMounted, ref } from "vue";
import { useRouter } from "vue-router";
import Sidebar from "./includes/Sidebar.vue";
import axios from "axios";
const router = useRouter();
let user = ref("");
let title = ref("");
let description = ref("");
let status = ref("");
let tasks = ref([]);
let showMore = ref(false);
const token = ref("");
const updateTask = ref({
    id: "",
    title: "",
    description: "",
    status: "",
});
const toggleDescription = () => {
    showMore.value = !showMore.value;
};

const getTasks = (token) => {
    axios
        .get("http://127.0.0.1:8000/api/user/tasks", {
            headers: {
                Authorization: `Bearer ${token}`,
            },
        })
        .then((res) => {
            console.log(res.data.tasks);
            tasks.value = res.data.tasks;
            // tasks.value = res.data;
        })
        .catch((err) => {
            console.log(err);
        });
};
const getTask = (taskId) => {
    updateTask.value = tasks.value.find((task) => task.id === taskId) || {};
};

const onSubmit = () => {
    let body = {
        title: title.value,
        description: description.value,
        status: status.value,
        user_id: user.value.id,
    };
    console.log(body);
    axios
        .post("http://127.0.0.1:8000/api/create_task", body)
        .then((res) => {
            console.log(res);
        })
        .catch((err) => {
            console.log(err);
        });
};
const DeleteTask = (taskId) => {
    axios
        .delete(`http://127.0.0.1:8000/api/delete_task/${taskId}`)
        .then((res) => {
            console.log(res);
            alert("Deleted Succesfully");
            getTasks(token.value);
        })
        .catch((err) => {
            console.log(err);
        });
};

const onUpdate = () => {
    axios
        .put(
            `http://127.0.0.1:8000/api/update_task/${updateTask.value.id}`,
            updateTask.value
        )
        .then((res) => {
            console.log(res);
            alert("Updated Successfully");
        })
        .catch((err) => {
            console.log(err);
        });
    console.log(updateTask.value.id);
};
onMounted(() => {
    user.value = JSON.parse(localStorage.getItem("user"));
    token.value = localStorage.getItem("token");

    if (!user) {
        router.push({ path: "/" });
        console.log("error no user signed in");
    }
    getTasks(token.value);
});
</script>

<style scoped>
/* Add specific styles for the status indicators */
.status-indicator {
  width: 12px;
  height: 12px;
  border-radius: 50%;
  display: inline-block;
}
.bg-danger { background-color: #dc3545; }
.bg-warning { background-color: #ffc107; }
.bg-success { background-color: #28a745; }
</style>
