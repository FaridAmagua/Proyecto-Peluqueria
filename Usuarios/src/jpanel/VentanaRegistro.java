package jpanel;

import java.awt.BorderLayout;
import java.awt.EventQueue;
import java.sql.CallableStatement;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.Vector;
import java.util.logging.Level;
import java.util.logging.Logger;

import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;

import Conexiones.*;

import javax.swing.JButton;
import javax.swing.JTextField;
import javax.swing.JLabel;
import javax.swing.JOptionPane;

import java.awt.Color;
import javax.swing.ImageIcon;
import javax.swing.JPasswordField;
import javax.swing.JComboBox;
import javax.swing.AbstractButton;
import javax.swing.DefaultComboBoxModel;
import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;
import javax.swing.SwingConstants;
import java.awt.SystemColor;

public class VentanaRegistro extends JFrame {

	private JPanel contentPane;
	private JTextField txtUsuario;
	private JTextField txtNombre;
	private JTextField txtPrimerApellido;
	private JTextField txtSegundoApellido;
	public JButton btnEnviar;
	private JTextField txtCorreo;
	private JTextField txtDireccion;
	private JTextField txtTelefono;
	private JComboBox ComboSexo;

	// RECOGER DATOS


	String Usuarios;
	String Nombres;
	String Contrasenas;
	String PrimerApellidos;
	String SegundoApellidos;
	String Telefonos;
	String Direcciones;
	String Correos;
	String Combobox;
	private JLabel lblFondo;
	private JPasswordField txtContrasena;



	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					VentanaRegistro frame = new VentanaRegistro();
					frame.setVisible(true);

				} catch (Exception e) {
					e.printStackTrace();
				}
			}
		});
	}

	/**
	 * Create the frame.
	 */
	public VentanaRegistro() {
		setBounds(100, 100, 872, 605);
		contentPane = new JPanel();
		contentPane.setBackground(SystemColor.info);
		contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));
		setContentPane(contentPane);
		contentPane.setLayout(null);
		this.setLocationRelativeTo(null);


		txtUsuario = new JTextField();
		txtUsuario.setBounds(226, 58, 230, 31);
		contentPane.add(txtUsuario);
		txtUsuario.setColumns(10);

		txtNombre = new JTextField();
		txtNombre.setColumns(10);
		txtNombre.setBounds(226, 173, 230, 31);
		contentPane.add(txtNombre);

		txtPrimerApellido = new JTextField();
		txtPrimerApellido.setColumns(10);
		txtPrimerApellido.setBounds(127, 269, 230, 31);
		contentPane.add(txtPrimerApellido);

		txtSegundoApellido = new JTextField();
		txtSegundoApellido.setToolTipText("Mujer\r\nHombre\r\nNo especificar");
		txtSegundoApellido.setColumns(10);
		txtSegundoApellido.setBounds(491, 269, 230, 31);
		contentPane.add(txtSegundoApellido);



		btnEnviar = new JButton("Enviar\r\n");
		btnEnviar.addMouseListener(new MouseAdapter() {
			private Object comboBoxs;

			@Override
			public void mouseClicked(MouseEvent e) {
				try {



					Enviar();
				} catch (SQLException e1) {
					System.out.println("ERROS METEDO ENVIAR");
					// TODO Auto-generated catch block
					e1.printStackTrace();
				}
			}
		});
		btnEnviar.setBounds(646, 479, 111, 28);
		contentPane.add(btnEnviar);

		txtCorreo = new JTextField();
		txtCorreo.setBounds(229, 385, 230, 31);
		contentPane.add(txtCorreo);
		txtCorreo	.setColumns(10);

		txtDireccion = new JTextField();
		txtDireccion.setBounds(226, 432, 230, 31);
		contentPane.add(txtDireccion);
		txtDireccion.setColumns(10);

		ComboSexo = new JComboBox();
		ComboSexo.setModel(new DefaultComboBoxModel(new String[] {"Mujer ", "Hombre", "No especificar"}));
		ComboSexo.setToolTipText("\r\n");
		ComboSexo.setBounds(512, 429, 230, 31);

		contentPane.add(ComboSexo);
		//String selected = this.comboBox.GetItemText(this.comboBox.SelectedItem);



		txtTelefono = new JTextField();
		txtTelefono.setBounds(226, 335, 230, 31);
		contentPane.add(txtTelefono);
		txtTelefono.setColumns(10);
		
		txtContrasena = new JPasswordField();
		txtContrasena.setBounds(230, 113, 230, 31);
		contentPane.add(txtContrasena);
		
		lblFondo = new JLabel("");
		lblFondo.setIcon(new ImageIcon("C:\\Users\\farid\\Downloads\\Recursos app\\FONDOFINALV1.png"));
		lblFondo.setBounds(0, 0, 856, 566);
		contentPane.add(lblFondo);

	}

	@SuppressWarnings("deprecation")
	private void Enviar() throws SQLException    {
	

		Connection con = null;
		try {
			con = Conexiones.Conexion.getConnection();
			
			

		

		

		} catch (ClassNotFoundException e1) {
			// TODO Auto-generated catch block
			e1.printStackTrace();
			System.out.println("ERROR CONEXION");
		}

		


		try {
			//ENCRIPTAR CONTRASEÑA
			
			Contrasenas = txtContrasena.getText();
			
			String encriptada = Hash.getHash(Contrasenas, "MD5");
			//
			
			String query ="{call AltaUsuario(?,?,?,?,?,?,?,?,?,?)}";
			CallableStatement cs = con.prepareCall(query);
			cs.setString(1,txtUsuario.getText());
			cs.setString(2,txtNombre.getText());
			cs.setString(3,encriptada);
			cs.setString(4,txtPrimerApellido.getText());	
			cs.setString(5,txtSegundoApellido.getText());	
			cs.setString(6,txtTelefono.getText());
			cs.setString(7,txtDireccion.getText());
			cs.setString(8,txtCorreo.getText());
			cs.setString(9,String.valueOf(ComboSexo.getSelectedItem()));
							
			
//Resto de sets
			
			cs.registerOutParameter(10, java.sql.Types.INTEGER);
			cs.execute();

			int resultado = cs.getInt(10);
			System.out.println(resultado);









			if (resultado == 0) {
				JOptionPane.showMessageDialog(null, "USUARIO REGISTRADO CORRECTAMENTE");
				borrar();
			}

			cs.close();




		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			JOptionPane.showMessageDialog(null, "USUARIO NO REGISTRADO COMPRUEBE BIEN LOS CAMPOS", "Algo anda mal", JOptionPane.WARNING_MESSAGE);

		}




	}

	private void borrar() {
		// TODO Auto-generated method stub
		
		txtUsuario.setText(null);
		txtNombre.setText(null);
		txtPrimerApellido.setText(null);
		txtSegundoApellido.setText(null);
		txtCorreo.setText(null);
		txtDireccion.setText(null);
		txtTelefono.setText(null);
	}
}




