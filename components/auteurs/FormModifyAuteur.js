
export const FormModifyAuteur = ({auteur}) => {

    async function handleSubmit(event) {
        event.preventDefault();
        const formData = {
            firstname: event.target.firstname.value,
            lastname: event.target.lastname.value,
            id: event.target.id.value
        };

        /*await fetch(process.env.NEXT_PUBLIC_URL+'/api/auteurs', {
            method: "put",
            body: JSON.stringify(formData),
        });*/
    }

    return (
        <div key={auteur.id} className="mt-5 p-8 border-4 border-red-600 bg-gray-800 rounded-3xl">
            <form onSubmit={handleSubmit}>
                <div className="grid grid-rows-1 grid-flow-col gap-2">
                    <div className="col-start-1 lg:row-start-1 lg:col-span-2">
                        <label className="block">Prénom</label>
                        <input
                            type="text"
                            className="block w-full p-2 border-2 border-gray-800 rounded-lg bg-gray-700 focus:outline-none focus:border-red-600"
                            placeholder="Prénom"
                            name="firstname"
                            defaultValue={auteur.firstname}
                        />
                    </div>

                    <div className="col-start-1 lg:row-start-2 lg:col-span-2">
                        <label className="block">Nom</label>
                        <input
                            type="text"
                            className="block w-full p-2 border-2 border-gray-800 rounded-lg bg-gray-700 focus:outline-none focus:border-red-600"
                            placeholder="Nom"
                            name="lastname"
                            defaultValue={auteur.lastname}
                        />
                    </div>
                    <input type="hidden" name="id" value={auteur.id}/>
                    <div className="col-start-1 lg:row-start-3 lg:col-span-2">
                        <button className="p-2 bg-green-700 rounded-lg hover:bg-green-500">Modifier</button>
                    </div>
                </div>
            </form>
        </div>
    );

}