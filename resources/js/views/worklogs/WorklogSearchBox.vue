<template>
    <div class="card card-primary collapsed-card">
        <div class="card-header">
            <h3 class="card-title">Search Box</h3>
            <div class="card-tools">
                <button
                    type="button"
                    class="btn btn-tool"
                    data-card-widget="collapse"
                    title="Collapse"
                >
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <!-- Tìm kiếm chung -->
                <div class="col-4">
                    <div class="form-group">
                        <label>Search:</label>
                        <div class="position-relative">
                            <input
                                v-model="searchQuery"
                                type="text"
                                class="form-control"
                                placeholder="Enter Epic/Task Title"
                                @input="
                                    filterWorklogs();
                                    emit('updateSearchQuery', searchQuery);
                                "
                            />
                            <button
                                v-if="searchQuery"
                                @click="resetSearchTitle"
                                class="btn btn-sm btn-light position-absolute"
                                style="
                                    right: 10px;
                                    top: 50%;
                                    transform: translateY(-50%);
                                "
                            >
                                ✖
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Tìm kiếm theo Plan Start Date -->
                <div class="col-6">
                    <div class="form-group">
                        <label>Filter Logged Date:</label>
                        <div class="d-flex align-items-center">
                            <!-- Plan Start Date (From) -->
                            <div
                                class="input-group date mr-2"
                                id="logDatePickerFrom"
                                data-target-input="nearest"
                            >
                                <input
                                    type="text"
                                    id="logDateFrom"
                                    class="form-control datetimepicker-input"
                                    data-target="#logDatePickerFrom"
                                    placeholder="From"
                                />
                                <div
                                    class="input-group-append"
                                    data-target="#logDatePickerFrom"
                                    data-toggle="datetimepicker"
                                >
                                    <div class="input-group-text">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Dấu "-" -->
                            <span class="mx-2">-</span>

                            <!-- Plan Start Date (To) -->
                            <div
                                class="input-group date ml-2"
                                id="logDatePickerTo"
                                data-target-input="nearest"
                            >
                                <input
                                    type="text"
                                    id="logDateTo"
                                    class="form-control datetimepicker-input"
                                    data-target="#logDatePickerTo"
                                    placeholder="To"
                                />
                                <div
                                    class="input-group-append"
                                    data-target="#logDatePickerTo"
                                    data-toggle="datetimepicker"
                                >
                                    <div class="input-group-text">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <!-- Select multiple-->
                    <div class="form-group">
                        <label>Select Display Column</label>
                        <select
                            id="selectDisplayColumns"
                            class="select2"
                            multiple="multiple"
                            data-placeholder="Select Columns"
                            style="width: 100%"
                        >
                            <option value="project-name">Project</option>
                            <option value="epic_task">Epic/Task</option>
                            <option value="plan-effort">Plan Effort</option>
                            <option value="actual-effort">Actual Effort</option>
                            <option value="logged-date">Logged Date</option>
                            <option value="logged-time">Logged Time</option>
                            <option value="description">Description</option>
                            <option value="action">Action</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, computed, onMounted, nextTick } from "vue";
import moment from "moment";

const searchQuery = ref("");

const logDateFrom = ref(""); // Lọc từ ngày bắt đầu
const logDateTo = ref(""); // Lọc đến ngày bắt đầu

onMounted(() => {
    nextTick(() => {
        if (window.jQuery && $.fn.select2 && $.fn.datetimepicker) {
            // Set default date range (last 30 days)
            const today = moment();
            const thirtyDaysAgo = moment().subtract(30, 'days');
            
            const formattedToday = today.format('YYYY-MM-DD');
            const formattedThirtyDaysAgo = thirtyDaysAgo.format('YYYY-MM-DD');

            // Initialize date pickers
            $("#logDatePickerFrom").datetimepicker({
                format: "YYYY-MM-DD",
                buttons: {
                    showToday: true,
                    showClear: true,
                    showClose: true,
                },
                icons: {
                    today: "fa fa-calendar-day",
                    clear: "fa fa-trash",
                    close: "fa fa-times",
                },
                useCurrent: false,
                defaultDate: thirtyDaysAgo
            });

            $("#logDatePickerTo").datetimepicker({
                format: "YYYY-MM-DD",
                buttons: {
                    showToday: true,
                    showClear: true,
                    showClose: true,
                },
                icons: {
                    today: "fa fa-calendar-day",
                    clear: "fa fa-trash",
                    close: "fa fa-times",
                },
                useCurrent: false,
                defaultDate: today
            });

            // Set input values
            $("#logDateFrom").val(formattedThirtyDaysAgo);
            $("#logDateTo").val(formattedToday);

            // Set reactive variables
            logDateFrom.value = formattedThirtyDaysAgo;
            logDateTo.value = formattedToday;

            // Apply initial filter with default dates
            filterWorklogs();

            // Event handlers for date changes
            $("#logDatePickerFrom").on("change.datetimepicker", function (e) {
                let newDateFrom = e.date ? e.date.format("YYYY-MM-DD") : "";
                if (newDateFrom) {
                    logDateFrom.value = newDateFrom;
                    filterWorklogs();
                } else {
                    logDateFrom.value = "";
                    filterWorklogs();
                }
            });

            $("#logDatePickerTo").on("change.datetimepicker", function (e) {
                let newDateTo = e.date ? e.date.format("YYYY-MM-DD") : "";
                if (newDateTo) {
                    logDateTo.value = newDateTo;
                    filterWorklogs();
                } else {
                    logDateTo.value = "";
                    filterWorklogs();
                }
            });

            $("#selectDisplayColumns").select2();

            let defaultColumns = [
                "project-name",
                "epic_task",
                "logged-date",
                "logged-time",
                "description",
                "action",
            ];
            $("#selectDisplayColumns").val(defaultColumns).trigger("change");

            // Bắt sự kiện change từ select2
            $("#selectDisplayColumns").on(
                "select2:select select2:unselect",
                function () {
                    let selectedColumns = $(this).val() || [];
                    emit("updateVisibleColumns", selectedColumns);
                }
            );

            // Gửi danh sách mặc định khi component được mount
            emit("updateVisibleColumns", defaultColumns);
        } else {
            console.error("Select2 is not loaded properly.");
        }
    });
});

const props = defineProps({
    worklogs: Array, // Danh sách tasks đã phẳng từ backend
});

const emit = defineEmits([
    "updateFilteredWorklogs",
    "updateSearchQuery",
    "blankQuery",
    "updateVisibleColumns",
]);

const filterWorklogs = () => {
    let filtered = props.worklogs;

    if (searchQuery.value.trim()) {
        const query = searchQuery.value.toLowerCase();
        filtered = filtered.filter(
            (worklog) =>
                worklog.task?.name?.toLowerCase().includes(query) ||
                worklog.description?.toLowerCase().includes(query)
        );
    }

    if (logDateFrom.value) {
        filtered = filtered.filter(
            (worklog) => worklog.log_date >= logDateFrom.value
        );
    }

    if (logDateTo.value) {
        filtered = filtered.filter(
            (worklog) => worklog.log_date <= logDateTo.value
        );
    }

    if (
        searchQuery.value === "" &&
        logDateFrom.value === "" &&
        logDateTo.value === ""
    ) {
        emit("blankQuery", true);
    } else {
        emit("blankQuery", false);
    }

    emit("updateFilteredWorklogs", filtered);
};

const resetSearchTitle = () => {
    searchQuery.value = "";
    filterWorklogs();
};
</script>
