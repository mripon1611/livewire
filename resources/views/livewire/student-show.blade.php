<div>
    @include('livewire.student-modal')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(session()->has('message'))
                <h5 class="alert alert-success">{{ session('message') }}</h5>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Students
                            <input type="search" wire:model="search" class="form-control float-end mx-2" placeholder="Search.." style="width:20%;">
                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#studentModal">
                                Add New Student
                            </button>
                        </h4>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-hover compact nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Course</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($students as $student)
                                <tr>
                                    <td>{{ $student->id }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->course }}</td>
                                    <td>
                                        <button type="button" wire:click="editStudent({{$student->id}})" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateStudentModal">Edit</button>
                                        <button type="button" wire:click="deleteStudent({{$student->id}})" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteStudentModal">Delete</button>
                                    </td>
                                </tr>
                                @empty
                                <tr class="text-center">
                                    <td colspan="5">No Records Found!</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            {{ $students->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>