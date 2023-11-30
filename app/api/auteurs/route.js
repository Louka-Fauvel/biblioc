import {query} from "@/app/lib/db";

export async function GET(req, res) {

    try {

        const auteurs = await query({
            query:"SELECT * FROM auteur LIMIT 10;",
            values: []
        });
        return Response.json({auteur: auteurs});

    } catch (error) {

        return new Error(error);

    }

}

export async function PUT(req, res) {

    console.log("test PUT", res);
    /*try {

        const auteur = await query({
            query:"UPDATE auteurs SET firstname = ?, lastname = ? WHERE id = ?",
            values: [req.firstname, req.lastname, req.id]
        });

        return Response.json({auteur: auteur});

    } catch (error) {

        return new Error(error);

    }*/
}