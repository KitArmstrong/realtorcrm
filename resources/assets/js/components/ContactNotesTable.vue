<template>
    <div class="contact-notes-table-wrapper">
        <div class="contact-notes-button">
            <el-button class="btn-icon-only btn-normal" size="mini" @click="startAddNote()"><i class="fas fa-plus"></i></el-button>
        </div>
        <table class="contact-notes-table scrollable-table">
            <thead>
            </thead>
            <tbody>
                <tr class="blank-row d-none">
                    <td class="note-date">
                        New
                    </td>
                    <td class="row-note">
                        <input type="text" class="row-note-edit" refs="newNote" value="" placeholder="Enter new note here" />
                    </td>
                    <td class="row-actions">
                        <el-button class="btn-icon-only btn-normal" size="mini" @click="resetAdd()"><i class="fas fa-times"></i></el-button>
                        <el-button class="btn-icon-only btn-success" size="mini" @click="endAddNote()"><i class="fas fa-save"></i></el-button>
                    </td>
                </tr>
                <tr class="comment-row"  v-for="(note, index) in notes" :key="note.note_id">
                    <td class="note-date">{{note.date}}</td>
                    <td class="row-note">{{note.note}}</td>
                    <td class="row-actions">
                        <div class="main-actions">
                            <a href="#" @click.prevent="editNote(index, note.note_id)">Edit</a> | 
                            <el-popover
                                placement="top"
                                trigger="click">
                                <div class="popover-message">
                                    Are you sure you want to delete this comment?
                                </div>
                                <div class="popover-buttons d-flex d-just-center">
                                    <el-button class="btn-normal" size="mini" @click="closePopover(note.note_id)">Cancel</el-button>
                                    <el-button class="btn-danger" size="mini" @click="deleteNote(index, note.note_id)">Delete</el-button>
                                </div>
                                <a href="#" slot="reference" :ref="'delete' + note.note_id">Delete</a>
                            </el-popover>
                        </div>
                        <div class="edit-actions d-none">
                            <el-button class="btn-icon-only btn-normal" size="mini" @click="cancelEdit(index, note.note_id)"><i class="fas fa-times"></i></el-button>
                            <el-button class="btn-icon-only btn-success" size="mini" @click="saveEdit(index, note.note_id)"><i class="fas fa-save"></i></el-button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
    	data() {
    		return {
                notes: [],
                notesInEdit: [],
                contactTableLoading: true,
                loadingElement: null
    		}
    	},

    	props: {
			contactId: {
			    type: Number,
			    required: true,
			}
		},

        methods: {
        	getContactNotes: function(contactId) {
				axios.get('/notes', {
					params: {
						contactid: contactId
					}
				})
				.then(response => {
					this.notes = response.data;
                    this.contactTableLoading = false;
				});
            },
            editNote: function(index, noteId) {
                let commentRow = document.querySelector('.contact-notes-table .comment-row:nth-child(' + (index + 2) + ')');
                let noteCell = commentRow.querySelector(' .row-note');
                let editButtons = commentRow.querySelector( '.main-actions');
                let editConfirmButtons = commentRow.querySelector( '.edit-actions');

                // Get the current value.
                let noteValue = noteCell.textContent;

                this.notesInEdit[noteId] = noteValue;

                // Create the input for edit.
                let input = '<input type="text" class="row-note-edit" value="' + noteValue + '" />';

                noteCell.innerHTML = input;

                editButtons.classList.add('d-none');
                editConfirmButtons.classList.remove('d-none');

                this.$refs.newNote.focus();
            },
            cancelEdit: function(index, noteId) {
                let commentRow = document.querySelector('.contact-notes-table .comment-row:nth-child(' + (index + 2) + ')');
                let noteCell = commentRow.querySelector(' .row-note');
                let editInput = noteCell.querySelector('input')
                let editButtons = commentRow.querySelector( '.main-actions');
                let editConfirmButtons = commentRow.querySelector( '.edit-actions'); 

                noteCell.innerHTML = this.notesInEdit[noteId];
                delete this.notesInEdit[noteId];

                editConfirmButtons.classList.add('d-none');
                editButtons.classList.remove('d-none');
            },
            saveEdit: function(index, noteId) {
                let commentRow = document.querySelector('.contact-notes-table .comment-row:nth-child(' + (index + 2) + ')');
                let noteCell = commentRow.querySelector(' .row-note');
                let editInput = noteCell.querySelector('input')
                let editButtons = commentRow.querySelector( '.main-actions');
                let editConfirmButtons = commentRow.querySelector( '.edit-actions');

                axios.post('/note/edit', {
                    noteid: noteId,
                    newnote: editInput.value
                })
                .then(response => {
                    noteCell.innerHTML = editInput.value;

                    editConfirmButtons.classList.add('d-none');
                    editButtons.classList.remove('d-none');
                });
            },
            startAddNote: function() {
                document.querySelector('.contact-notes-table .blank-row').classList.remove('d-none'); 
            },
            endAddNote: function() {
                // Start loading animation
                this.contactTableLoading = true;

                let note = document.querySelector('.contact-notes-table .blank-row .row-note input').value; 
                axios.post('/note/add', {
                    contactid: this.contactId,
                    note: note
                })
                .then(response => {
                    if(response.data.success)
                    {
                        this.resetAdd();
                        // On successfull add reload the table data
                        this.getContactNotes(this.contactId);
                    }
                });
            },
            resetAdd: function() {
                let newRow = document.querySelector('.contact-notes-table .blank-row');
                    
                newRow.classList.add('d-none');
                newRow.querySelector('.row-note input').value = '';
            },
            deleteNote: function(index, noteId) {
                axios.post('/note/delete', {
                    noteid: noteId
                })
                .then(response => {
                    this.closePopover(noteId);
                    this.notes.splice(index, 1);
                });
            },
            closePopover: function(noteId) {
                let button = this.$refs['delete' + noteId.toString()];
                // Because ref IDs were assinged in v-for, must access as an arrary
                button[0].click();
            }
        },

        watch: {
            contactTableLoading: function(contactTableLoading) {
                if(contactTableLoading)
                {
                 this.loadingElement = this.$loading({
                    target: '.contact-notes-table',
                    text: 'Loading',
                    background: 'rgba(0, 0, 0, 0.7)'
                    });
                }
                else
                {
                    if(this.loadingElement)
                    {
                        this.loadingElement.close();
                        this.loadingElement = null;
                    }
                }
            }
        },

		created: function() {
            this.contactTableLoading = true;
            this.getContactNotes(this.contactId);
        }
    }
</script>
