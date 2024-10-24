import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';

export default function NoteDetail({ note }) {

    console.log(note)

    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                    Note by {note.user.name}
                </h2>
            }
        >
            <Head title={`Note by ${note.user.name}`} />

            <div className="bg-white p-6 shadow-sm rounded-lg">
                <p className="text-gray-700 mb-6">{note.title}</p>
            </div>

            <div className="mt-8">
                <h4 className="text-xl font-semibold mb-4 dark:text-white">Blocks</h4>

                {note.blocks.length > 0 ? (
                    note.blocks.map((block, index) => (
                        <div
                            key={index}
                            className="bg-gray-100 p-4 rounded-lg shadow-sm mb-4"
                        >
                            <h5 className="font-bold">{block.title}</h5>
                            <p className="text-gray-600">{block.content}</p>
                        </div>
                    ))
                ) : (
                    <p>No blocks for this note yet.</p>
                )}
            </div>
        </AuthenticatedLayout>
    );
}
