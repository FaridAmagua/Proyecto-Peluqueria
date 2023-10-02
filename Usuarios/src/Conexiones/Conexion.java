package Conexiones;


import java.sql.*;





public class Conexion {


	private static String nombreBd="peluqueria";
	private static String usuario="farid";
	public static String password="123";
	private static String url="jdbc:mysql://localhost:3306/"+nombreBd;
	
	
	


	// PRUEBAS 
	

	
	public static boolean status=false;
	public static Connection contacto = null;
	public static String Contrasenas;


	public static Connection getConnection() throws ClassNotFoundException {
		try {
			Class.forName("com.mysql.cj.jdbc.Driver");
			System.out.println("CONECTADO");
			status =true ;
		} catch (ClassNotFoundException e) {
			// TODO: handle exception
			System.out.println("ERROR NO SE CONECTO ");
		}try {
			
		
			
			contacto=DriverManager.getConnection(url,Conexion.usuario,Conexion.password);
			status=true;
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return contacto;
	}



//	public static void Consulta ()/*(String consulta)*/ {
//		status=false;
//
//		Connection con = null;
//		try {
//			con = getConnection();
//		} catch (ClassNotFoundException e1) {
//			// TODO Auto-generated catch block
//			e1.printStackTrace();
//		}
//		Statement declara;
//		try {
//			declara=con.createStatement();
//			ResultSet respuesta = declara.executeQuery("select * from cliente");
//			while (respuesta.next()) {
//				System.out.println(respuesta.getString("usuario") + ", " + respuesta.getString("nombre"));
//			}
//
//		} catch (SQLException e) {
//			// TODO: handle exception
//			System.out.println("ERROR CONSULTA");
//		}
//
//
//	}

	public static void setCuenta(String usuarioo,String passwordUsuario) {
		// CAMBIAR A USUARIOOO Y PASSWORDDD
		
		
		
		Conexion.usuario = usuarioo;
		
		
		
		
		

		
		Conexion.password=passwordUsuario;
		
	
		
	}
	public static boolean getstatus() {
		return status;
		//
	}

/*
	public static void llamada() throws SQLException {
		try {
			Connection accesoBD = Conexion.getConnection();
			
			PreparedStatement cs = accesoBD.prepareStatement("call Consultar		Usuarios(?,?,?,?,?	)}");
			
			int id_cliente = 0;
			cs.setInt(1, id_cliente);
		
			
		} catch (ClassNotFoundException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		*/
		
		
		
		
	
}







