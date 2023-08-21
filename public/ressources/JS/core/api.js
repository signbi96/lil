export class Api{
  
    static async getData(url){
         const response = await fetch(url);  
         return response.json();
    }
    static async postData(url = "",data = {}){
        const response = await fetch(url,{
            method: "POST",
            headers:{
                "Content-Type": "application/json" 
            },
            body:JSON.stringify(data),
        });
            return response.json();
    }
}