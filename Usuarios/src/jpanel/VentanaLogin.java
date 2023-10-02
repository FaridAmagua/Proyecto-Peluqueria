package jpanel;


import Conexiones.*;
import java.awt.BorderLayout;

import java.awt.EventQueue;
import java.awt.Menu;

import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.JTextField;
import javax.swing.JPasswordField;
import javax.swing.JButton;
import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;
import java.awt.event.ActionListener;
import java.awt.event.ActionEvent;
import java.awt.event.KeyAdapter;
import java.awt.event.KeyEvent;
import javax.swing.ImageIcon;

public class VentanaLogin extends JFrame {

	private JPanel contentPane;
	private JTextField txtUsuario;
	private JPasswordField passwordUsuario;
	private JLabel lblFondo;
	public String Contrasenas;


	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					VentanaLogin frame = new 						
							VentanaLogin();
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
	public VentanaLogin() {
		setOpacity(1.0f);
		setResizable(false);
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setBounds(100, 100, 474, 376);
		contentPane = new JPanel();
		contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));
		setContentPane(contentPane);
		contentPane.setLayout(null);
		this.setLocationRelativeTo(null);


		txtUsuario = new JTextField();
		txtUsuario.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				passwordUsuario.requestFocus();			}
		});
		txtUsuario.setBounds(109, 107, 224, 35);
		contentPane.add(txtUsuario);
		txtUsuario.setColumns(10);

		passwordUsuario = new JPasswordField();
		passwordUsuario.addKeyListener(new KeyAdapter() {

			//TECLA ENTER 
			@Override
			public void keyPressed(KeyEvent e) {
				if(e.getKeyCode()==KeyEvent.VK_ENTER){
					//PEGAMOS LA CONEXION (BOTON ENTER)
					Conexiones.Conexion.setCuenta(txtUsuario.getText(),passwordUsuario.getText());
					try {
						Conexiones.Conexion.getConnection();





					} catch (ClassNotFoundException e1) {
						// TODO Auto-generated catch block
						e1.printStackTrace();
					}

					if (Conexiones.Conexion.getstatus()) {
						VentanaMenu a = new VentanaMenu();
						a.setVisible(true); 
					}else {
						JOptionPane.showMessageDialog(null,"datos incrorectos");
						txtUsuario.setText("");
						passwordUsuario.setText("");
					}		


				}
			}
		});
		passwordUsuario.setBounds(109, 218, 224, 34);
		contentPane.add(passwordUsuario);

		JButton btnLogin = new JButton("Login\r\n");
		btnLogin.addMouseListener(new MouseAdapter() {
			@Override
			public void mouseClicked(MouseEvent e) {





				Conexiones.Conexion.setCuenta(txtUsuario.getText(),passwordUsuario.getText());
				try {
					Conexiones.Conexion.getConnection();





				} catch (ClassNotFoundException e1) {
					// TODO Auto-generated catch block
					e1.printStackTrace();
				}

				if (Conexiones.Conexion.getstatus()) {
					VentanaMenu a = new VentanaMenu();
					a.setVisible(true); 
				}else {
					JOptionPane.showMessageDialog(null,"datos incrorectos");
					txtUsuario.setText("");
					passwordUsuario.setText("");
				}


			}
		});
		btnLogin.setBounds(163, 272, 89, 23);
		contentPane.add(btnLogin);

		lblFondo = new JLabel("New label");
		lblFondo.setIcon(new ImageIcon("C:\\Users\\farid\\Downloads\\Recursos app\\Loginv1.png"));
		lblFondo.setBounds(0, 0, 458, 337);
		contentPane.add(lblFondo);

	}

}
