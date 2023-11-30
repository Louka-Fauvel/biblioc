'use client';
import {FormModifyAuteur} from "@/components/auteurs/FormModifyAuteur";

export const ListAuteurs = ({auteurs}) => {

    const handleFormModifyAuteurIs = async (id) => {
        const formHiddenAuteur = await document.getElementById("formModifyAuteur"+id);
        formHiddenAuteur.classList.remove("hidden");
    }

    return (
        <div className="grid justify-items-center space-y-4">
            {auteurs.map((auteur) => {
                return (
                    <div key={auteur.id}>
                        <div className="grid grid-cols-2 gap-8">
                            <div className="flex items-center">
                                <p>{auteur.firstname} {auteur.lastname}</p>
                            </div>
                            <div className="">
                                <button onClick={() => handleFormModifyAuteurIs(auteur.id)} className="p-2 bg-green-700 rounded-lg hover:bg-green-500">Modifier</button>
                            </div>
                        </div>
                        <div id={"formModifyAuteur"+auteur.id} className="hidden">
                            <FormModifyAuteur auteur={auteur}/>
                        </div>
                    </div>
                );
            })}
        </div>
    );

}